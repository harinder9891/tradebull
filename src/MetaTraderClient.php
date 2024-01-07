<?php


namespace Tarikh\PhpMeta;


use Tarikh\PhpMeta\Entities\Trade;
use Tarikh\PhpMeta\Entities\User;
use Tarikh\PhpMeta\Exceptions\ConnectionException;
use Tarikh\PhpMeta\Exceptions\TradeException;
use Tarikh\PhpMeta\Exceptions\UserException;
use Tarikh\PhpMeta\Lib\MTAuthProtocol;
use Tarikh\PhpMeta\Lib\MTConnect;
use Tarikh\PhpMeta\Lib\MTLogger;
use Tarikh\PhpMeta\Lib\MTRetCode;
use Tarikh\PhpMeta\Lib\MTTradeProtocol;
use Tarikh\PhpMeta\Lib\MTUser;
use Tarikh\PhpMeta\Lib\MTUserProtocol;
use Tarikh\PhpMeta\Lib\MTOrderProtocol;
use Tarikh\PhpMeta\Lib\MTEnDealAction;
use Tarikh\PhpMeta\Lib\MTHistoryProtocol;
use Tarikh\PhpMeta\Lib\MTOrder;
use Tarikh\PhpMeta\Lib\MTPositionProtocol;
use Tarikh\PhpMeta\Lib\MTPosition;
use Tarikh\PhpMeta\Traits\Deal;
use Tarikh\PhpMeta\Lib\MTDealProtocol;
use Tarikh\PhpMeta\Lib\MTGroupProtocol;
use Tarikh\PhpMeta\Entities\Order;
use Tarikh\PhpMeta\Lib\CMT5Request;

//+------------------------------------------------------------------+
//--- web api version
define("WebAPIVersion", 484);
//--- web api date
define("WebAPIDate", "18 June 2021");

class MetaTraderClient
{
    use Deal;
    /**
     * @var MTConnect $m_connect
     */
    protected $m_connect;
    //--- name agent
    protected $server;
    //--- is set crypt connection
    protected $port;
    protected $username;
    protected $password;
    private   $m_agent    = 'WebAPI';
    private   $m_is_crypt = true;
    /**
     * @var bool
     */
    private $debug;

    public function __construct($server, $port, $username, $password, $debug = false)
    {

        $file_path = 'logs/';
        $this->m_agent = "WebAPI";
        $this->m_is_crypt = true;
        MTLogger::Init($this->m_agent, $debug, $file_path);
        $this->server = $server;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->debug = $debug;
    }

    /**
     * Create trade record such as Deposit or Withdrawal
     * @param Trade $trade
     * @return Trade
     * @throws ConnectionException
     * @throws TradeException
     */
    public function trade(Trade $trade): Trade
    {
        if (!$this->isConnected()) {
            $conn = $this->connect();
            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_trade = new MTTradeProtocol($this->m_connect);
        $ticket = null;

        $call = $mt_trade->TradeBalance($trade->getLogin(), $trade->getType(), $trade->getAmount(), $trade->getComment(), $ticket);
        if ($call != MTRetCode::MT_RET_OK) {
            throw new TradeException(MTRetCode::GetError($call));
        }
        $trade->setTicket($ticket);
        return $trade;
    }

    /**
     * Check connection
     * @return bool
     */
    public function isConnected()
    {
        return $this->m_connect != null;
    }

    public function connect()
    {
        $ip = $this->server;
        $port = $this->port;
        $login = $this->username;
        $password = $this->password;
        $timeout = 3000;

        //--- create connection class
        $this->m_connect = new MTConnect($ip, $port, $timeout, $this->m_is_crypt);
        // dd($login, $password);
        //--- create connection
        if (($error_code = $this->m_connect->Connect()) != MTRetCode::MT_RET_OK) return $error_code;
        //--- authorization to MetaTrader 5 server
        $auth = new MTAuthProtocol($this->m_connect, $this->m_agent);
        //---
        $crypt_rand = '';
        if (($error_code = $auth->Auth($login, $password, $this->m_is_crypt, $crypt_rand)) != MTRetCode::MT_RET_OK) {
            //--- disconnect
            $this->disconnect();
            return $error_code;
        }
        //--- if need crypt
        if ($this->m_is_crypt) $this->m_connect->SetCryptRand($crypt_rand, $password);
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Disconnect from MetaTrader 5 server
     * @return void
     */
    public function disconnect()
    {
        if ($this->m_connect) $this->m_connect->Disconnect();
    }

    /**
     * Create new User
     * @param User $user
     * @return User
     * @throws ConnectionException
     * @throws UserException
     */
    public function createUser(User $user): User
    {
      
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTUserProtocol($this->m_connect);
        $mtUser = MTUser::CreateDefault();
        // echo'<pre>';
        // print_r($user->getLogin());
        // echo'</pre>';
        if ($user->getLogin()) {
            $mtUser->Login = $user->getLogin();
        }
        else{
            $mtUser->Login ="next";
        }
        $mtUser->Group = $user->getGroup();
        $mtUser->Name = $user->getName();
        $mtUser->Email = $user->getEmail();
        $mtUser->Address = $user->getAddress();
        $mtUser->City = $user->getCity();
        $mtUser->State = $user->getState();
        $mtUser->Country = $user->getCountry();
        $mtUser->MainPassword = $user->getMainPassword();
        $mtUser->Phone = $user->getPhone();
        $mtUser->PhonePassword = $user->getPhonePassword();
        $mtUser->InvestPassword = $user->getInvestorPassword();
        $mtUser->Leverage = $user->getLeverage();
        $mtUser->ZipCode = $user->getZipCode();
      
        $newMtUser = MTUser::CreateDefault();
       
        $result = $mt_user->Add($mtUser, $newMtUser);
        echo'<pre>';
        print_r($result);
        echo'</pre>';
        if ($result != MTRetCode::MT_RET_OK) {
          
            throw new UserException(MTRetCode::GetError($result));
        }

        $user->setLogin($newMtUser->Login);
        return $user;
    }

    /**
     * Get list users login
     *
     * @param string $group
     * @return MTRetCode
     * @throws ConnectionException
     * @throws UserException
     */
    public function getUserLogins($group)
    {

        die('i am here');
        $logins = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }

        $mt_user = new MTUserProtocol($this->m_connect);
        $result = $mt_user->UserLogins($group, $logins);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $logins;
    }

    public function getUserBatch($login)
    {
        $logins = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }

        $mt_user = new MTUserProtocol($this->m_connect);

        $result = $mt_user->UserGetBatch($login, $logins);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $logins;
    }

    public function getAccountsBatch($login)
    {
        $logins = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }

        $mt_user = new MTUserProtocol($this->m_connect);

        $result = $mt_user->UserAccountGetBatch($login, $logins);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $logins;
    }

    /**
     * Get User Information By Login
     * @param $login
     * @return MTUser
     * @throws ConnectionException
     * @throws UserException
     */
    public function getUser($login)
    {
        $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTUserProtocol($this->m_connect);
        $result = $mt_user->Get($login, $user);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $user;
    }

    /**
     * Delete user by login
     * @param $login
     * @return bool
     * @throws ConnectionException
     * @throws UserException
     */
    public function deleteUser($login)
    {
        $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTUserProtocol($this->m_connect);
        $result = $mt_user->Delete($login, $user);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return true;
    }

    /**
     * Get Open Order Details
     * @param $ticket
     * @return int
     * @throws ConnectionException
     * @throws UserException
     */
    public function getOrder($ticket)
    {
        $order = null;
        $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTOrderProtocol($this->m_connect);
        $result = $mt_order->OrderGet($ticket, $order);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $order;
    }

    /**
     * Get Total Order
     * @param $login
     * @return int
     * @throws ConnectionException
     * @throws UserException
     */
    public function getOrderTotal($login)
    {
        $total = null;
        // $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTOrderProtocol($this->m_connect);
        $result = $mt_order->OrderGetTotal($login, $total);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $total;
    }

    /**
     * Get Open Order Pagination
     * @param $login
     * @param $offset
     * @param $total
     * @return null
     * @throws ConnectionException
     * @throws UserException
     */
    public function getOrderPagination($login, $offset, $total)
    {
        $orders = null;
        $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTOrderProtocol($this->m_connect);
        $result = $mt_order->OrderGetPage($login, $offset, $total, $orders);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $orders;
    }

    /**
     * Conduct User balance
     * @param $login
     * @param MTEnDealAction $type
     * @param $balance
     * @param $comment
     * @return null
     * @throws ConnectionException
     * @throws UserException
     */
    public function conductUserBalance($login, $type, $balance, $comment)
    {
        $ticket = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTTradeProtocol($this->m_connect);
        $result = $mt_order->TradeBalance($login, $type, $balance, $comment, $ticket);

        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $ticket;
    }

    /**
     * @param $user
     * @return MTUser
     * @throws ConnectionException
     * @throws UserException
     */
    public function updateUser($user)
    {
        $newUser = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTUserProtocol($this->m_connect);
        $result = $mt_user->Update($user, $newUser);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $newUser;
    }

    /**
     * Get Closed Order Details
     * @param $ticket
     * @return int
     * @throws ConnectionException
     * @throws UserException
     */
    public function getOrderHistory($ticket)
    {
        $order = 0;
        $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTHistoryProtocol($this->m_connect);
        $result = $mt_order->HistoryGet($ticket, $order);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $order;
    }

    /**
     * Get Total Closed Order
     * @param $login
     * @return int
     * @throws ConnectionException
     * @throws UserException
     */
    public function getOrderHistoryTotal($login, $from, $to)
    {
        $total = 0;
        $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTHistoryProtocol($this->m_connect);
        $result = $mt_order->HistoryGetTotal($login, $from, $to, $total);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $total;
    }

    /**
     * Get Closed Order Pagination
     * @param $login
     * @param $offset
     * @param $total
     * @return MTOrder[]
     * @throws ConnectionException
     * @throws UserException
     */
    public function getOrderHistoryPagination($login, $from, $to, $offset, $total)
    {
        $orders = null;
        $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTHistoryProtocol($this->m_connect);
        $result = $mt_order->HistoryGetPage($login, $from, $to, $offset, $total, $orders);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $orders;
    }

    /**
     * Get Total Open Position
     * @param $login
     * @return int
     * @throws ConnectionException
     * @throws UserException
     */
    public function getPosition($ticket, $symbol)
    {
        $position = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTPositionProtocol($this->m_connect);
        $result = $mt_order->PositionGet($ticket, $symbol, $position);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $position;
    }

    /**
     * Get Total Open Position
     * @param $login
     * @return int
     * @throws ConnectionException
     * @throws UserException
     */
    public function getPositionTotal($login)
    {
        $total = 0;
        $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTPositionProtocol($this->m_connect);
        $result = $mt_order->PositionGetTotal($login, $total);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $total;
    }

    /**
     * Get Open Position Pagination
     * @param $login
     * @param $offset
     * @param $total
     * @return MTPosition[]
     * @throws ConnectionException
     * @throws UserException
     */
    public function getPositionPaginate($login, $offset, $total)
    {
        $positions = [];
        $user = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_order = new MTPositionProtocol($this->m_connect);

        $result = $mt_order->PositionGetPage($login, $offset, $total, $positions);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $positions;
    }

    /**
     * Change User Password
     * @param $login
     * @param $newPassword
     * @param string $type
     * @return bool
     * @throws ConnectionException
     * @throws UserException
     */
    public function changePasswordUser($login, $newPassword, $type = "MAIN")
    {
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTUserProtocol($this->m_connect);
        $result = $mt_user->PasswordChange($login, $newPassword, $type);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return true;
    }

    public function checkPassword($login, $password, $type = "MAIN")
    {
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTUserProtocol($this->m_connect);
        $result = $mt_user->PasswordCheck($login, $password, $type);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return true;
    }

    public function getTradingAccounts($login)
    {
        $accounts = [];
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTUserProtocol($this->m_connect);
        $result = $mt_user->AccountGet($login, $accounts);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $accounts;
    }

    public function getDealTotal($login, $from, $to)
    {
        $total = 0;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTDealProtocol($this->m_connect);
        $result = $mt_user->DealGetTotal($login, $from, $to, $total);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $total;
    }

    public function getDealPaginate($login, $from, $to, $offset, $total)
    {
        $deals = [];
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTDealProtocol($this->m_connect);
        $result = $mt_user->DealGetPage($login, $from, $to, $offset, $total, $deals);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $deals;
    }

    public function getDeal($ticket)
    {
        $deal = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTDealProtocol($this->m_connect);
        $result = $mt_user->DealGet($ticket, $deal);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $deal;
    }

    /**
     * Get Group Information by group name
     * @param $name
     * @return null
     * @throws ConnectionException
     * @throws UserException
     */
    public function getGroup($name)
    {
        $group = null;
        if (!$this->isConnected()) {
            $conn = $this->connect();

            if ($conn != MTRetCode::MT_RET_OK) {
                throw new ConnectionException(MTRetCode::GetError($conn));
            }
        }
        $mt_user = new MTGroupProtocol($this->m_connect);
        $result = $mt_user->GroupGet($name, $group);
        if ($result != MTRetCode::MT_RET_OK) {
            throw new UserException(MTRetCode::GetError($result));
        }
        return $group;
    }


    public function newOrder(Order $order): bool
    {
        // Example of use
        $request = new CMT5Request();
        // Authenticate on the server using the Auth command
        if ($request->Init($this->server.":".$this->port) && $request->Auth($this->username, $this->password, WebAPIVersion, "WebManager")) {

            // Let us request the symbol named TEST using the symbol_get command
            $path = '/api/dealer/send_request';
            $result = $request->Get($path, json_encode([
                'Login'  => $order->getLogin(),
                'Action' => $order->getAction(),
                'Type'   => $order->getType(),
                'Volume' => $order->getVolume(),
                'Symbol' => $order->getSymbol(),
            ]));
        }
        $request->Shutdown();

        return true;
    }

}
