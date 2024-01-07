<?php


namespace Tarikh\PhpMeta\Lib;

//+------------------------------------------------------------------+
//|                                             MetaTrader 5 Web API |
//|                   Copyright 2001-2019, MetaQuotes Software Corp. |
//|                                        http://www.metaquotes.net |
//+------------------------------------------------------------------+
/**
 * Class work with users
 */
class MTUserProtocol
{
    private $m_connect; // connection to MT5 server
    /**
     * @param $connect MTConnect connect to MT5 server
     */
    public function __construct($connect)
    {
        $this->m_connect = $connect;
    }

    /**
     * Add new user
     *
     * @param $user     MTUser information about user
     * @param $new_user MTUser information about user getting from server
     *
     * @return MTRetCode
     */
    public function Add($user, &$new_user)
    {
        //--- send request
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_ADD, $this->GetParamAdd($user)))
        {
            if(MTLogger::getIsWriteLog()) if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user add failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user add is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- parse answer
        if(($error_code = $this->ParseAddUser($answer, $user_answer)) != MTRetCode::MT_RET_OK)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user add failed: [' . $error_code . ']' . MTRetCode::GetError($error_code));
            return $error_code;
        }
        //---
        $new_user = $user_answer->GetFromJson();
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Check answer from MetaTrader 5 server
     *
     * @param  $answer      string answer from server
     * @param  $user_answer MTUserAnswer
     *
     * @return MTRetCode
     */
    private function ParseAddUser(&$answer, &$user_answer)
    {
        $pos = 0;
        //--- get command answer
        $command_real = $this->m_connect->GetCommand($answer, $pos);
        if($command_real != MTProtocolConsts::WEB_CMD_USER_ADD) return MTRetCode::MT_RET_ERR_DATA;
        //---
        $user_answer = new MTUserAnswer();
        //--- get param
        $pos_end = -1;
        while(($param = $this->m_connect->GetNextParam($answer, $pos, $pos_end)) != null)
        {
            switch($param['name'])
            {
                case MTProtocolConsts::WEB_PARAM_RETCODE:
                    $user_answer->RetCode = $param['value'];
                    break;
                //---
                case MTProtocolConsts::WEB_PARAM_LOGIN:
                    $user_answer->Login = $param['value'];
                    break;
            }
        }
        //--- check ret code
        if(($ret_code = MTConnect::GetRetCode($user_answer->RetCode)) != MTRetCode::MT_RET_OK) return $ret_code;
        //--- check login
        if(empty($user_answer->Login)) return MTRetCode::MT_RET_ERR_PARAMS;
        //--- get json
        if(($user_answer->ConfigJson = $this->m_connect->GetJson($answer, $pos_end)) == null) return MTRetCode::MT_RET_REPORT_NODATA;
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Check answer from MetaTrader 5 server
     *
     * @param  $command     string command
     * @param  $answer      string answer from server
     * @param  $user_answer MTUserAnswer
     *
     * @return MTRetCode
     */
    private function ParseUser($command, &$answer, &$user_answer)
    {
        $pos = 0;
        //--- get command answer
        $command_real = $this->m_connect->GetCommand($answer, $pos);
        if($command_real != $command) return MTRetCode::MT_RET_ERR_DATA;
        //---
        $user_answer = new MTUserAnswer();
        //--- get param
        $pos_end = -1;
        while(($param = $this->m_connect->GetNextParam($answer, $pos, $pos_end)) != null)
        {
            switch($param['name'])
            {
                case MTProtocolConsts::WEB_PARAM_RETCODE:
                    $user_answer->RetCode = $param['value'];
                    break;
            }
        }
        //--- check ret code
        if(($ret_code = MTConnect::GetRetCode($user_answer->RetCode)) != MTRetCode::MT_RET_OK) return $ret_code;
        //--- get json
        if(($user_answer->ConfigJson = $this->m_connect->GetJson($answer, $pos_end)) == null) return MTRetCode::MT_RET_REPORT_NODATA;
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Update user
     *
     * @param $user     MTUser information about user
     * @param $new_user MTUser information about user getting from server
     *
     * @return MTRetCode
     */
    public function Update($user, &$new_user)
    {
        //--- send request
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_UPDATE, $this->GetParamUpdate($user)))
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user update failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user update is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- parse answer
        if(($error_code = $this->ParseUser(MTProtocolConsts::WEB_CMD_USER_UPDATE, $answer, $user_answer)) != MTRetCode::MT_RET_OK)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user add failed: [' . $error_code . ']' . MTRetCode::GetError($error_code));
            return $error_code;
        }
        //---
        $new_user = $user_answer->GetFromJson();
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Update user
     *
     * @param $login int login
     * @param $user  MTUser information about user getting from server
     *
     * @return MTRetCode
     */
    public function Get($login, &$user)
    {
        $data = array(MTProtocolConsts::WEB_PARAM_LOGIN => $login);
        //--- send request
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_GET, $data))
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user get failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user get is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- parse answer
        if(($error_code = $this->ParseUser(MTProtocolConsts::WEB_CMD_USER_GET, $answer, $user_answer)) != MTRetCode::MT_RET_OK)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user get failed: [' . $error_code . ']' . MTRetCode::GetError($error_code));
            return $error_code;
        }
        //---
        $user = $user_answer->GetFromJson();
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Update user
     *
     * @param $login int login
     *
     * @return MTRetCode
     */
    public function Delete($login)
    {
        $login = (int)$login;
        $data  = array(MTProtocolConsts::WEB_PARAM_LOGIN => $login);
        //--- send request
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_DELETE, $data))
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user delete failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user delete is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- parse answer
        if(($error_code = $this->ParseClearCommand(MTProtocolConsts::WEB_CMD_USER_DELETE, $answer)) != MTRetCode::MT_RET_OK)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user delete failed: [' . $error_code . ']' . MTRetCode::GetError($error_code));
            return $error_code;
        }
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Check answer from MetaTrader 5 server
     *
     * @param  $command string command
     * @param  $answer  string answer from server
     *
     * @return MTRetCode
     */
    private function ParseClearCommand($command, &$answer)
    {
        $pos = 0;
        //--- get command answer
        $command_real = $this->m_connect->GetCommand($answer, $pos);
        if($command_real != $command) return MTRetCode::MT_RET_ERR_DATA;
        //---
        $user_answer = new MTUserAnswer();
        //--- get param
        $pos_end = -1;
        while(($param = $this->m_connect->GetNextParam($answer, $pos, $pos_end)) != null)
        {
            switch($param['name'])
            {
                case MTProtocolConsts::WEB_PARAM_RETCODE:
                    $user_answer->RetCode = $param['value'];
                    break;
            }
        }
        //--- check ret code
        if(($ret_code = MTConnect::GetRetCode($user_answer->RetCode)) != MTRetCode::MT_RET_OK) return $ret_code;
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * check user password
     *
     * @param        $login    int
     * @param        $password string
     * @param string $type     WEB_VAL_USER_PASS_MAIN | WEB_VAL_USER_PASS_INVESTOR
     *
     * @return MTRetCode
     */
    public function PasswordCheck($login, $password, $type = MTProtocolConsts::WEB_VAL_USER_PASS_MAIN)
    {
        $login = (int)$login;
        //--- send request
        $data = array(MTProtocolConsts::WEB_PARAM_LOGIN    => $login,
            MTProtocolConsts::WEB_PARAM_TYPE     => $type,
            MTProtocolConsts::WEB_PARAM_PASSWORD => $password);
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_PASS_CHECK, $data))
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user password check failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user password check is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- parse answer
        if(($error_code = $this->ParseClearCommand(MTProtocolConsts::WEB_CMD_USER_PASS_CHECK, $answer)) != MTRetCode::MT_RET_OK)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user password check failed: [' . $error_code . ']' . MTRetCode::GetError($error_code));
            return $error_code;
        }
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * user password change
     *
     * @param        $login        int
     * @param        $new_password string new password
     * @param string $type         WEB_VAL_USER_PASS_MAIN | WEB_VAL_USER_PASS_INVESTOR
     *
     * @return MTRetCode
     */
    public function PasswordChange($login, $new_password, $type = MTProtocolConsts::WEB_VAL_USER_PASS_MAIN)
    {
        $login = (int)$login;
        //--- send request
        $data = array(MTProtocolConsts::WEB_PARAM_LOGIN    => $login,
            MTProtocolConsts::WEB_PARAM_TYPE     => $type,
            MTProtocolConsts::WEB_PARAM_PASSWORD => $new_password);
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_PASS_CHANGE, $data))
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user password change failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user password change is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- parse answer
        if(($error_code = $this->ParseClearCommand(MTProtocolConsts::WEB_CMD_USER_PASS_CHANGE, $answer)) != MTRetCode::MT_RET_OK)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user password change failed: [' . $error_code . ']' . MTRetCode::GetError($error_code));
            return $error_code;
        }
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * user deposit change
     *
     * @param $login       int
     * @param $new_deposit float deposit
     * @param $comment     string comment
     * @param $type        MTEnDealAction type of balance: DEAL_BALANCE, DEAL_CREDIT, DEAL_CHARGE, DEAL_BONUS
     *
     * @return MTRetCode
     */
    public function DepositChange($login, $new_deposit, $comment, $type)
    {
        $login = (int)$login;
        //--- send request
        $data = array(MTProtocolConsts::WEB_PARAM_LOGIN   => $login,
            MTProtocolConsts::WEB_PARAM_TYPE    => $type,
            MTProtocolConsts::WEB_PARAM_BALANCE => $new_deposit,
            MTProtocolConsts::WEB_PARAM_COMMENT => $comment);
        //--
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_DEPOSIT_CHANGE, $data))
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user deposit change failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user deposit change is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- parse answer
        if(($error_code = $this->ParseClearCommand(MTProtocolConsts::WEB_CMD_USER_DEPOSIT_CHANGE, $answer)) != MTRetCode::MT_RET_OK)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user deposit change failed: [' . $error_code . ']' . MTRetCode::GetError($error_code));
            return $error_code;
        }
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * user acount get
     *
     * @param $login   int
     * @param $account MTAccount
     *
     * @return MTRetCode
     */
    public function AccountGet($login, &$account)
    {
        $login = (int)$login;
        $data  = array(MTProtocolConsts::WEB_PARAM_LOGIN => $login);
        //--- send request
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_ACCOUNT_GET, $data))
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user account get failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user account get is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- parse answer
        if(($error_code = $this->ParseUserAccount(MTProtocolConsts::WEB_CMD_USER_ACCOUNT_GET, $answer, $user_account)) != MTRetCode::MT_RET_OK)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user account get failed: [' . $error_code . ']' . MTRetCode::GetError($error_code));
            return $error_code;
        }
        //---
        $account = $user_account->GetFromJson();
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * parsing answer for command user account get
     *
     * @param $command      MTProtocolConsts
     * @param $answer       string
     * @param $user_account MTUserAccountAnswer
     *
     * @return MTRetCode
     */
    private function ParseUserAccount($command, $answer, &$user_account)
    {
        $pos = 0;
        //--- get command answer
        $command_real = $this->m_connect->GetCommand($answer, $pos);
        if($command_real != $command) return MTRetCode::MT_RET_ERR_DATA;
        //---
        $user_account = new MTUserAccountAnswer();
        //--- get param
        $pos_end = -1;
        while(($param = $this->m_connect->GetNextParam($answer, $pos, $pos_end)) != null)
        {
            switch($param['name'])
            {
                case MTProtocolConsts::WEB_PARAM_RETCODE:
                    $user_account->RetCode = $param['value'];
                    break;
            }
        }
        //--- check ret code
        if(($ret_code = MTConnect::GetRetCode($user_account->RetCode)) != MTRetCode::MT_RET_OK) return $ret_code;
        //--- get json
        if(($user_account->ConfigJson = $this->m_connect->GetJson($answer, $pos_end)) == null) return MTRetCode::MT_RET_REPORT_NODATA;
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Get list users login
     *
     * @param string     $group
     * @param array(int) $logins
     *
     * @return MTRetCode
     */
    public function UserLogins($group, &$logins)
    {
        $data = array(MTProtocolConsts::WEB_PARAM_GROUP => $group);
        //--- send request
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_USER_LOGINS, $data))
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user logins get failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user logins get is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }
        $user_logins = null;
        //--- parse answer
        if(($error_code = $this->ParseUserLogins($answer, $user_logins)) != MTRetCode::MT_RET_OK)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user logins get failed: [' . $error_code . '] ' . MTRetCode::GetError($error_code));
            return $error_code;
        }
        //---
        $logins = $user_logins->GetFromJson();
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Get list users login
     *
     * @param string     $group
     * @param array(int) $logins
     *
     * @return MTRetCode
     */
    public function UserGetBatch($group, &$logins)
    {
        $data = array(MTProtocolConsts::WEB_PARAM_LOGIN => $group);

        //--- send request
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_USER_GET_BATCH, $data))
        {

            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user logins get failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }

        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {

            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user logins get is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }

        $user_logins = null;
        //--- parse answer
        if(($error_code = $this->ParseUserLoginBatch($answer, $user_logins)) != MTRetCode::MT_RET_OK)
        {

            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user logins get failed: [' . $error_code . '] ' . MTRetCode::GetError($error_code));
            return $error_code;
        }

        //---
        $logins = $user_logins->GetArrayFromJson();

        //---
        return MTRetCode::MT_RET_OK;
    }

    public function UserAccountGetBatch($group, &$logins)
    {
        $data = array(MTProtocolConsts::WEB_PARAM_LOGIN => $group);

        //--- send request
        if(!$this->m_connect->Send(MTProtocolConsts::WEB_CMD_USER_USER_ACCOUNT_GET_BATCH, $data))
        {

            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'send user logins get failed');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }

        //--- get answer
        if(($answer = $this->m_connect->Read()) == null)
        {
            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'answer user logins get is empty');
            return MTRetCode::MT_RET_ERR_NETWORK;
        }

        $user_logins = null;
        //--- parse answer
        if(($error_code = $this->ParseUserAccountBatch($answer, $user_logins)) != MTRetCode::MT_RET_OK)
        {

            if(MTLogger::getIsWriteLog()) MTLogger::write(MTLoggerType::ERROR, 'parse user logins get failed: [' . $error_code . '] ' . MTRetCode::GetError($error_code));
            return $error_code;
        }

        //---
        $logins = $user_logins->GetArrayFromJson();

        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * parsing answer for command user_logins
     *
     * @param $answer       string
     * @param $user_account MTUserAccountAnswer
     *
     * @return MTRetCode
     */
    private function ParseUserLogins($answer, &$user_account)
    {
        $pos = 0;
        //--- get command answer
        $command_real = $this->m_connect->GetCommand($answer, $pos);

        if($command_real != MTProtocolConsts::WEB_CMD_USER_USER_LOGINS) return MTRetCode::MT_RET_ERR_DATA;
        //---
        $user_account = new MTUserLoginsAnswer();
        //--- get param
        $pos_end = -1;
        while(($param = $this->m_connect->GetNextParam($answer, $pos, $pos_end)) != null)
        {
            switch($param['name'])
            {
                case MTProtocolConsts::WEB_PARAM_RETCODE:
                    $user_account->RetCode = $param['value'];
                    break;
            }
        }
        //--- check ret code
        if(($ret_code = MTConnect::GetRetCode($user_account->RetCode)) != MTRetCode::MT_RET_OK) return $ret_code;
        //--- get json
        if(($user_account->ConfigJson = $this->m_connect->GetJson($answer, $pos_end)) == null) return MTRetCode::MT_RET_REPORT_NODATA;
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * parsing answer for command user_logins
     *
     * @param $answer       string
     * @param $user_account MTUserAccountAnswer
     *
     * @return MTRetCode
     */
    private function ParseUserLoginBatch($answer, &$user_account)
    {
        $pos = 0;
        //--- get command answer
        $command_real = $this->m_connect->GetCommand($answer, $pos);

        if($command_real != MTProtocolConsts::WEB_CMD_USER_USER_GET_BATCH) return MTRetCode::MT_RET_ERR_DATA;
        //---
        $user_account = new MTUserBatchAnswer();
        //--- get param
        $pos_end = -1;
        while(($param = $this->m_connect->GetNextParam($answer, $pos, $pos_end)) != null)
        {
            switch($param['name'])
            {
                case MTProtocolConsts::WEB_PARAM_RETCODE:
                    $user_account->RetCode = $param['value'];
                    break;
            }
        }
        //--- check ret code
        if(($ret_code = MTConnect::GetRetCode($user_account->RetCode)) != MTRetCode::MT_RET_OK) return $ret_code;
        //--- get json
        if(($user_account->ConfigJson = $this->m_connect->GetJson($answer, $pos_end)) == null) return MTRetCode::MT_RET_REPORT_NODATA;
        //---
        return MTRetCode::MT_RET_OK;
    }

    private function ParseUserAccountBatch($answer, &$user_account)
    {
        $pos = 0;
        //--- get command answer
        $command_real = $this->m_connect->GetCommand($answer, $pos);

        if($command_real != MTProtocolConsts::WEB_CMD_USER_USER_ACCOUNT_GET_BATCH) return MTRetCode::MT_RET_ERR_DATA;
        //---
        $user_account = new MTUserAccountAnswer();
        //--- get param
        $pos_end = -1;
        while(($param = $this->m_connect->GetNextParam($answer, $pos, $pos_end)) != null)
        {
            switch($param['name'])
            {
                case MTProtocolConsts::WEB_PARAM_RETCODE:
                    $user_account->RetCode = $param['value'];
                    break;
            }
        }
        //--- check ret code
        if(($ret_code = MTConnect::GetRetCode($user_account->RetCode)) != MTRetCode::MT_RET_OK) return $ret_code;
        //--- get json
        if(($user_account->ConfigJson = $this->m_connect->GetJson($answer, $pos_end)) == null) return MTRetCode::MT_RET_REPORT_NODATA;
        //---
        return MTRetCode::MT_RET_OK;
    }

    /**
     * check all fields on null
     *
     * @param MTUser $user
     */
    private function CheckNull(&$user)
    {
        //--- login
        if($user->Login == null) $user->Login = 0;
        //--- group
        if($user->Group == null) $user->Group = "";
        //--- certificate serial number
        if($user->CertSerialNumber == null) $user->CertSerialNumber = 0;
        //--- MTEnUsersRights
        if($user->Rights == null) $user->Rights = 0;
        //--- MQID
        if($user->MQID == null) $user->MQID = "";
        //--- registration datetime (filled by MT5)
        if($user->Registration == null) $user->Registration = 0;
        if($user->LastAccess == null) $user->LastAccess = 0;
        if($user->LastPassChange == null) $user->LastPassChange = 0;
        if($user->LastIP == null) $user->LastIP = "";
        //--- name
        if($user->Name == null) $user->Name = "";
        //--- company
        if($user->Company == null) $user->Company = "";
        //--- external system account (exchange, ECN, etc)
        if($user->Account == null) $user->Account = "";
        //--- country
        if($user->Country == null) $user->Country = "";
        //--- client language (WinAPI LANGID)
        if($user->Language == null) $user->Language = 0;
        //--- client id
        if($user->ClientID == null) $user->ClientID = 0;
        //--- city
        if($user->City == null) $user->City = "";
        //--- state
        if($user->State == null) $user->State = "";
        //--- ZIP code
        if($user->ZipCode == null) $user->ZipCode = "";
        //--- address
        if($user->Address == null) $user->Address = "";
        //--- phone
        if($user->Phone == null) $user->Phone = "";
        //--- email
        if($user->Email == null) $user->Email = "";
        //--- additional ID
        if($user->ID == null) $user->ID = "";
        //--- additional status
        if($user->Status == null) $user->Status = "";
        //--- comment
        if($user->Comment == null) $user->Comment = "";
        //--- color
        if($user->Color == null) $user->Color = 0;
        //--- phone password
        if($user->PhonePassword == null) $user->PhonePassword = "";
        //--- leverage
        if($user->Leverage == null) $user->Leverage = 0;
        //--- agent account
        if($user->Agent == null) $user->Agent = 0;
        //--- main password
        if($user->MainPassword == null) $user->MainPassword = "";
        //--- invest password
        if($user->InvestPassword == null) $user->InvestPassword = "";
        //--- balance & credit
        if($user->Balance == null) $user->Balance = 0;
        if($user->Credit == null) $user->Credit = 0;
        //--- accumulated interest rate
        if($user->InterestRate == null) $user->InterestRate = 0;
        //--- accumulated daily and monthly commissions
        if($user->CommissionDaily == null) $user->CommissionDaily = 0;
        if($user->CommissionMonthly == null) $user->CommissionMonthly = 0;
        //--- previous balance state
        if($user->BalancePrevDay == null) $user->BalancePrevDay = 0;
        if($user->BalancePrevMonth == null) $user->BalancePrevMonth = 0;
        //--- previous equity state
        if($user->EquityPrevDay == null) $user->EquityPrevDay = 0;
        if($user->EquityPrevMonth == null) $user->EquityPrevMonth = 0;
        //--- external trade accounts
        if($user->TradeAccounts == null) $user->TradeAccounts = "";
        //--- leads
        if($user->LeadCampaign == null) $user->LeadCampaign = "";
        if($user->LeadSource == null) $user->LeadSource = "";
    }

    /**
     * Get string of params for sending to MetaTrader 5 server
     *
     * @param $user MTUser
     *
     * @return string
     */
    private function GetParamAdd($user)
    {
        $this->CheckNull($user);
        return array(MTProtocolConsts::WEB_PARAM_LOGIN         => $user->Login,
            MTProtocolConsts::WEB_PARAM_PASS_MAIN     => $user->MainPassword,
            MTProtocolConsts::WEB_PARAM_PASS_INVESTOR => $user->InvestPassword,
            MTProtocolConsts::WEB_PARAM_RIGHTS        => $user->Rights,
            MTProtocolConsts::WEB_PARAM_GROUP         => $user->Group,
            MTProtocolConsts::WEB_PARAM_NAME          => $user->Name,
            MTProtocolConsts::WEB_PARAM_COMPANY       => $user->Company,
            MTProtocolConsts::WEB_PARAM_LANGUAGE      => $user->Language,
            MTProtocolConsts::WEB_PARAM_COUNTRY       => $user->Country,
            MTProtocolConsts::WEB_PARAM_CITY          => $user->City,
            MTProtocolConsts::WEB_PARAM_STATE         => $user->State,
            MTProtocolConsts::WEB_PARAM_ZIPCODE       => $user->ZipCode,
            MTProtocolConsts::WEB_PARAM_ADDRESS       => $user->Address,
            MTProtocolConsts::WEB_PARAM_PHONE         => $user->Phone,
            MTProtocolConsts::WEB_PARAM_EMAIL         => $user->Email,
            MTProtocolConsts::WEB_PARAM_ID            => $user->ID,
            MTProtocolConsts::WEB_PARAM_STATUS        => $user->Status,
            MTProtocolConsts::WEB_PARAM_COMMENT       => $user->Comment,
            MTProtocolConsts::WEB_PARAM_COLOR         => $user->Color,
            MTProtocolConsts::WEB_PARAM_PASS_PHONE    => $user->PhonePassword,
            MTProtocolConsts::WEB_PARAM_LEVERAGE      => $user->Leverage,
            MTProtocolConsts::WEB_PARAM_AGENT         => $user->Agent,
            MTProtocolConsts::WEB_PARAM_BALANCE       => $user->Balance,
            MTProtocolConsts::WEB_PARAM_BODYTEXT      => MTJson::Encode($user));
    }

    /**
     * Get string of params for sending to MetaTrader 5 server
     *
     * @param MTUser $user
     *
     * @return string
     */
    private function GetParamUpdate($user)
    {
        return array(MTProtocolConsts::WEB_PARAM_LOGIN      => $user->Login,
            MTProtocolConsts::WEB_PARAM_RIGHTS     => $user->Rights,
            MTProtocolConsts::WEB_PARAM_GROUP      => $user->Group,
            MTProtocolConsts::WEB_PARAM_NAME       => $user->Name,
            MTProtocolConsts::WEB_PARAM_COMPANY    => $user->Company,
            MTProtocolConsts::WEB_PARAM_LANGUAGE   => $user->Language,
            MTProtocolConsts::WEB_PARAM_COUNTRY    => $user->Country,
            MTProtocolConsts::WEB_PARAM_CITY       => $user->City,
            MTProtocolConsts::WEB_PARAM_STATE      => $user->State,
            MTProtocolConsts::WEB_PARAM_ZIPCODE    => $user->ZipCode,
            MTProtocolConsts::WEB_PARAM_ADDRESS    => $user->Address,
            MTProtocolConsts::WEB_PARAM_PHONE      => $user->Phone,
            MTProtocolConsts::WEB_PARAM_EMAIL      => $user->Email,
            MTProtocolConsts::WEB_PARAM_ID         => $user->ID,
            MTProtocolConsts::WEB_PARAM_STATUS     => $user->Status,
            MTProtocolConsts::WEB_PARAM_COMMENT    => $user->Comment,
            MTProtocolConsts::WEB_PARAM_COLOR      => $user->Color,
            MTProtocolConsts::WEB_PARAM_PASS_PHONE => $user->PhonePassword,
            MTProtocolConsts::WEB_PARAM_LEVERAGE   => $user->Leverage,
            MTProtocolConsts::WEB_PARAM_AGENT      => $user->Agent,
            MTProtocolConsts::WEB_PARAM_BODYTEXT   => MTJson::Encode($user));
    }
}

/**
 * client rights bit flags
 */

/**
 * User record
 */
class MTUser
{
    private const EXTERNAL_ID_MAXLEN = 32;
    private const EXTERNAL_ID_LIMIT  = 128;
    //--- login
    public $Login;

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->Login;
    }

    /**
     * @param mixed $Login
     */
    public function setLogin($Login)
    {
        $this->Login = $Login;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->Group;
    }

    /**
     * @param mixed $Group
     */
    public function setGroup($Group)
    {
        $this->Group = $Group;
    }

    /**
     * @return mixed
     */
    public function getCertSerialNumber()
    {
        return $this->CertSerialNumber;
    }

    /**
     * @param mixed $CertSerialNumber
     */
    public function setCertSerialNumber($CertSerialNumber)
    {
        $this->CertSerialNumber = $CertSerialNumber;
    }

    /**
     * @return mixed
     */
    public function getRights()
    {
        return $this->Rights;
    }

    /**
     * @param mixed $Rights
     */
    public function setRights($Rights)
    {
        $this->Rights = $Rights;
    }

    /**
     * @return mixed
     */
    public function getMQID()
    {
        return $this->MQID;
    }

    /**
     * @param mixed $MQID
     */
    public function setMQID($MQID)
    {
        $this->MQID = $MQID;
    }

    /**
     * @return mixed
     */
    public function getRegistration()
    {
        return $this->Registration;
    }

    /**
     * @param mixed $Registration
     */
    public function setRegistration($Registration)
    {
        $this->Registration = $Registration;
    }

    /**
     * @return mixed
     */
    public function getLastAccess()
    {
        return $this->LastAccess;
    }

    /**
     * @param mixed $LastAccess
     */
    public function setLastAccess($LastAccess)
    {
        $this->LastAccess = $LastAccess;
    }

    /**
     * @return mixed
     */
    public function getLastPassChange()
    {
        return $this->LastPassChange;
    }

    /**
     * @param mixed $LastPassChange
     */
    public function setLastPassChange($LastPassChange)
    {
        $this->LastPassChange = $LastPassChange;
    }

    /**
     * @return mixed
     */
    public function getLastIP()
    {
        return $this->LastIP;
    }

    /**
     * @param mixed $LastIP
     */
    public function setLastIP($LastIP)
    {
        $this->LastIP = $LastIP;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->Company;
    }

    /**
     * @param mixed $Company
     */
    public function setCompany($Company)
    {
        $this->Company = $Company;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->Account;
    }

    /**
     * @param mixed $Account
     */
    public function setAccount($Account)
    {
        $this->Account = $Account;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * @param mixed $Country
     */
    public function setCountry($Country)
    {
        $this->Country = $Country;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->Language;
    }

    /**
     * @param mixed $Language
     */
    public function setLanguage($Language)
    {
        $this->Language = $Language;
    }

    /**
     * @return mixed
     */
    public function getClientID()
    {
        return $this->ClientID;
    }

    /**
     * @param mixed $ClientID
     */
    public function setClientID($ClientID)
    {
        $this->ClientID = $ClientID;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * @param mixed $City
     */
    public function setCity($City)
    {
        $this->City = $City;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * @param mixed $State
     */
    public function setState($State)
    {
        $this->State = $State;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->ZipCode;
    }

    /**
     * @param mixed $ZipCode
     */
    public function setZipCode($ZipCode)
    {
        $this->ZipCode = $ZipCode;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @param mixed $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * @param mixed $Phone
     */
    public function setPhone($Phone)
    {
        $this->Phone = $Phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param mixed $Status
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->Comment;
    }

    /**
     * @param mixed $Comment
     */
    public function setComment($Comment)
    {
        $this->Comment = $Comment;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->Color;
    }

    /**
     * @param mixed $Color
     */
    public function setColor($Color)
    {
        $this->Color = $Color;
    }

    /**
     * @return mixed
     */
    public function getPhonePassword()
    {
        return $this->PhonePassword;
    }

    /**
     * @param mixed $PhonePassword
     */
    public function setPhonePassword($PhonePassword)
    {
        $this->PhonePassword = $PhonePassword;
    }

    /**
     * @return mixed
     */
    public function getLeverage()
    {
        return $this->Leverage;
    }

    /**
     * @param mixed $Leverage
     */
    public function setLeverage($Leverage)
    {
        $this->Leverage = $Leverage;
    }

    /**
     * @return mixed
     */
    public function getAgent()
    {
        return $this->Agent;
    }

    /**
     * @param mixed $Agent
     */
    public function setAgent($Agent)
    {
        $this->Agent = $Agent;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->Balance;
    }

    /**
     * @param mixed $Balance
     */
    public function setBalance($Balance)
    {
        $this->Balance = $Balance;
    }

    /**
     * @return mixed
     */
    public function getCredit()
    {
        return $this->Credit;
    }

    /**
     * @param mixed $Credit
     */
    public function setCredit($Credit)
    {
        $this->Credit = $Credit;
    }

    /**
     * @return mixed
     */
    public function getInterestRate()
    {
        return $this->InterestRate;
    }

    /**
     * @param mixed $InterestRate
     */
    public function setInterestRate($InterestRate)
    {
        $this->InterestRate = $InterestRate;
    }

    /**
     * @return mixed
     */
    public function getCommissionDaily()
    {
        return $this->CommissionDaily;
    }

    /**
     * @param mixed $CommissionDaily
     */
    public function setCommissionDaily($CommissionDaily)
    {
        $this->CommissionDaily = $CommissionDaily;
    }

    /**
     * @return mixed
     */
    public function getCommissionMonthly()
    {
        return $this->CommissionMonthly;
    }

    /**
     * @param mixed $CommissionMonthly
     */
    public function setCommissionMonthly($CommissionMonthly)
    {
        $this->CommissionMonthly = $CommissionMonthly;
    }

    /**
     * @return mixed
     */
    public function getBalancePrevDay()
    {
        return $this->BalancePrevDay;
    }

    /**
     * @param mixed $BalancePrevDay
     */
    public function setBalancePrevDay($BalancePrevDay)
    {
        $this->BalancePrevDay = $BalancePrevDay;
    }

    /**
     * @return mixed
     */
    public function getBalancePrevMonth()
    {
        return $this->BalancePrevMonth;
    }

    /**
     * @param mixed $BalancePrevMonth
     */
    public function setBalancePrevMonth($BalancePrevMonth)
    {
        $this->BalancePrevMonth = $BalancePrevMonth;
    }

    /**
     * @return mixed
     */
    public function getEquityPrevDay()
    {
        return $this->EquityPrevDay;
    }

    /**
     * @param mixed $EquityPrevDay
     */
    public function setEquityPrevDay($EquityPrevDay)
    {
        $this->EquityPrevDay = $EquityPrevDay;
    }

    /**
     * @return mixed
     */
    public function getEquityPrevMonth()
    {
        return $this->EquityPrevMonth;
    }

    /**
     * @param mixed $EquityPrevMonth
     */
    public function setEquityPrevMonth($EquityPrevMonth)
    {
        $this->EquityPrevMonth = $EquityPrevMonth;
    }

    /**
     * @return mixed
     */
    public function getTradeAccounts()
    {
        return $this->TradeAccounts;
    }

    /**
     * @param mixed $TradeAccounts
     */
    public function setTradeAccounts($TradeAccounts)
    {
        $this->TradeAccounts = $TradeAccounts;
    }

    /**
     * @return mixed
     */
    public function getLeadCampaign()
    {
        return $this->LeadCampaign;
    }

    /**
     * @param mixed $LeadCampaign
     */
    public function setLeadCampaign($LeadCampaign)
    {
        $this->LeadCampaign = $LeadCampaign;
    }

    /**
     * @return mixed
     */
    public function getLeadSource()
    {
        return $this->LeadSource;
    }

    /**
     * @param mixed $LeadSource
     */
    public function setLeadSource($LeadSource)
    {
        $this->LeadSource = $LeadSource;
    }

    /**
     * @return mixed
     */
    public function getMainPassword()
    {
        return $this->MainPassword;
    }

    /**
     * @param mixed $MainPassword
     */
    public function setMainPassword($MainPassword)
    {
        $this->MainPassword = $MainPassword;
    }

    /**
     * @return mixed
     */
    public function getInvestPassword()
    {
        return $this->InvestPassword;
    }

    /**
     * @param mixed $InvestPassword
     */
    public function setInvestPassword($InvestPassword)
    {
        $this->InvestPassword = $InvestPassword;
    }
    //--- group
    public $Group;
    //--- certificate serial number
    public $CertSerialNumber;
    //--- MTEnUsersRights
    public $Rights;
    //--- client's MetaQuotes ID
    public $MQID;
    //--- registration datetime (filled by MT5)
    public $Registration;
    //--- last access datetime (filled by MT5)
    public $LastAccess;
    //--- last password change datetime (filled by MT5)
    public $LastPassChange;
    //--- last ip-address
    public $LastIP;
    //--- name
    public $Name;
    //--- company
    public $Company;
    //--- external system account (exchange, ECN, etc)
    public $Account;
    //--- country
    public $Country;
    //--- client language (WinAPI LANGID)
    public $Language;
    //--- identificator by client
    public $ClientID;
    //--- city
    public $City;
    //--- state
    public $State;
    //--- ZIP code
    public $ZipCode;
    //--- address
    public $Address;
    //--- phone
    public $Phone;
    //--- email
    public $Email;
    //--- additional ID
    public $ID;
    //--- additional status
    public $Status;
    //--- comment
    public $Comment;
    //--- color
    public $Color;
    //--- phone password
    public $PhonePassword;
    //--- leverage
    public $Leverage;
    //--- agent account
    public $Agent;
    //--- balance & credit
    public $Balance;
    public $Credit;
    //--- accumulated interest rate
    public $InterestRate;
    //--- accumulated daily and monthly commissions
    public $CommissionDaily;
    public $CommissionMonthly;
    //--- previous balance state
    public $BalancePrevDay;
    public $BalancePrevMonth;
    //--- previous equity state
    public $EquityPrevDay;
    //--- previous equity state month
    public $EquityPrevMonth;
    //--- external trade accounts
    public $TradeAccounts;
    //--- lead campaign
    public $LeadCampaign;
    //--- lead source
    public $LeadSource;
    //--- main password
    public $MainPassword;
    //--- invest password
    public $InvestPassword;

    /**
     * Create user with default values
     * @return MTUser
     */
    public static function CreateDefault()
    {
        $user = new MTUser();
        //---
        $user->Rights   = 0x1E3; // MTEnUsersRights::USER_RIGHT_ENABLED | MTEnUsersRights::USER_RIGHT_PASSWORD | MTEnUsersRights::USER_RIGHT_TRAILING | MTEnUsersRights::USER_RIGHT_EXPERT | MTEnUsersRights::USER_RIGHT_API | MTEnUsersRights::USER_RIGHT_REPORTS
        $user->Leverage = 100;
        $user->Color    = 0xFF000000;
        //---
        return $user;
    }

    /**
     * Add external account to trade account
     * @param int $gateway_id
     * @param string $account
     * @return MTRetCode
     */
    public function ExternalAccountAdd($gateway_id,$account)
    {
        //--- checks
        if($account=="")
            return MTRetCode::MT_RET_ERR_PARAMS;
        if(strlen($account)>=self::EXTERNAL_ID_MAXLEN)
            return MTRetCode::MT_RET_ERR_DATA;
        //--- add new account
        $tmp=sprintf("%u=%s|",$gateway_id,$account);
        $result=$this->TradeAccounts.$tmp;
        //--- checks and update
        if(self::EXTERNAL_ID_LIMIT<=strlen($result))
            return MTRetCode::MT_RET_ERR_DATA;
        $this->TradeAccounts=$result;
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Update external account to trade account
     * @param int $pos
     * @param int $gateway_id
     * @param string $account
     * @return MTRetCode
     */
    public function ExternalAccountUpdate($pos,$gateway_id,$account)
    {
        //--- checks
        if($account=="")
            return MTRetCode::MT_RET_ERR_PARAMS;
        if(strlen($account)>=self::EXTERNAL_ID_MAXLEN)
            return MTRetCode::MT_RET_ERR_DATA;
        //--- update
        $tokens=explode("|", $this->TradeAccounts);
        $count =0;
        $result="";
        foreach ($tokens as $token)
        {
            if(strlen($token)<1) continue;
            if($pos==$count)
            {
                $tmp=sprintf("%u=%s|",$gateway_id,$account);
                $result=$result.$tmp;
            }
            else
            {
                $result=$result.$token;
                $result=$result."|";
            }
            $count++;
        }
        //--- checks and update
        if($pos>=$count)
            return MTRetCode::MT_RET_ERR_PARAMS;
        if(self::EXTERNAL_ID_LIMIT<=strlen($result))
            return MTRetCode::MT_RET_ERR_DATA;
        $this->TradeAccounts=$result;
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Update external account to trade account
     * @param int $pos
     * @return MTRetCode
     */
    public function ExternalAccountDelete($pos)
    {
        //--- delete
        $tokens=explode("|", $this->TradeAccounts);
        $count =0;
        $result="";
        foreach ($tokens as $token)
        {
            if(strlen($token)<1) continue;
            if($pos!=$count)
            {
                $result=$result.$token;
                $result=$result."|";
            }
            $count++;
        }
        //--- checks and delete
        if($pos>=$count)
            return MTRetCode::MT_RET_ERR_PARAMS;
        if(self::EXTERNAL_ID_LIMIT<=strlen($result))
            return MTRetCode::MT_RET_ERR_DATA;
        $this->TradeAccounts=$result;
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Clear all external accounts
     * @return MTRetCode
     */
    public function ExternalAccountClear()
    {
        $this->TradeAccounts="";
        return MTRetCode::MT_RET_OK;
    }

    /**
     * Total count of external accounts
     * @return int
     */
    public function ExternalAccountTotal()
    {
        $tokens=explode("|", $this->TradeAccounts);
        $count =0;
        foreach ($tokens as $token)
        {
            if(strlen($token)<1) continue;
            $count++;
        }
        return $count;
    }

    /**
     * Get external account by position
     * @param int $pos
     * @param int $gateway_id
     * @param string $account
     * @return MTRetCode
     */
    public function ExternalAccountNext($pos,&$gateway_id,&$account)
    {
        $gateway_id=0;
        $account="";
        $tokens =explode("|", $this->TradeAccounts);
        $count  =0;
        foreach ($tokens as $token)
        {
            if(strlen($token)<1) continue;
            if($pos==$count)
            {
                list($gateway_id, $account)=explode("=", $token);
                return MTRetCode::MT_RET_OK;
            }
            $count++;
        }
        return MTRetCode::MT_RET_ERR_PARAMS;
    }

    /**
     * Find external account for gateway
     * @param int $gateway_id
     * @param string $account
     * @return MTRetCode
     */
    public function ExternalAccountGet($gateway_id,&$account)
    {
        $account="";
        $tokens =explode("|", $this->TradeAccounts);
        foreach ($tokens as $token)
        {
            if(strlen($token)<1) continue;
            list($tmp_gateway_id, $tmp_account)=explode("=", $token);
            if($tmp_gateway_id==$gateway_id)
            {
                $account=$tmp_account;
                return MTRetCode::MT_RET_OK;
            }
        }
        return MTRetCode::MT_RET_ERR_NOTFOUND;
    }

}

/**
 * Class answer from server for requests about user
 */
class MTUserAnswer
{
    public $RetCode = '-1';
    public $Login = '';
    public $ConfigJson = '';

    /**
     * From json get class MTUser
     * @return MTUser
     */
    public function GetFromJson()
    {
        $obj = MTJson::Decode($this->ConfigJson);
        if($obj == null) return null;
        $result = new MTUser();
        //---
        $result->Login         = (int)$obj->Login;
        $result->Group         = (string)$obj->Group;
        $result->Rights        = (int)$obj->Rights;
        $result->Name          = (string)$obj->Name;
        $result->Company       = (string)$obj->Company;
        $result->Account       = (string)$obj->Account;
        $result->Country       = (string)$obj->Country;
        $result->Language      = (int)$obj->Language;
        $result->City          = (string)$obj->City;
        $result->State         = (string)$obj->State;
        $result->ZipCode       = (string)$obj->ZipCode;
        $result->Address       = (string)$obj->Address;
        $result->Phone         = (string)$obj->Phone;
        $result->Email         = (string)$obj->Email;
        $result->ClientID      = (int)$obj->ClientID;
        $result->ID            = (string)$obj->ID;
        $result->Status        = (string)$obj->Status;
        $result->Comment       = (string)$obj->Comment;
        $result->Color         = (int)$obj->Color;
        $result->PhonePassword = (string)$obj->PhonePassword;
        $result->Leverage      = (int)$obj->Leverage;
        $result->Agent         = (int)$obj->Agent;
        //---
        $result->CertSerialNumber = (int)$obj->CertSerialNumber;
        $result->Registration     = (int)$obj->Registration;
        $result->LastAccess       = (int)$obj->LastAccess;
        $result->LastPassChange    = (int)$obj->LastPassChange;
        $result->LastIP           = (string)$obj->LastIP;
        //---
        $result->Balance           = (float)$obj->Balance;
        $result->Credit            = (float)$obj->Credit;
        $result->InterestRate      = (float)$obj->InterestRate;
        $result->CommissionDaily   = (float)$obj->CommissionDaily;
        $result->CommissionMonthly = (float)$obj->CommissionMonthly;
        $result->BalancePrevDay    = (float)$obj->BalancePrevDay;
        $result->BalancePrevMonth  = (float)$obj->BalancePrevMonth;
        $result->EquityPrevDay     = (float)$obj->EquityPrevDay;
        $result->EquityPrevMonth   = (float)$obj->EquityPrevMonth;
        //---
        $result->MQID              = (string)$obj->MQID;
        $result->LeadSource        = (string)$obj->LeadSource;
        $result->LeadCampaign      = (string)$obj->LeadCampaign;
        //---
        $result->TradeAccounts     = (string)$obj->TradeAccounts;
        //---
        return $result;
    }
}


/**
 * Class answer from server for requests about user
 */
class MTUserBatchAnswer
{
    public $RetCode = '-1';
    public $Login = '';
    public $ConfigJson = '';

    /**
     * From json get class MTUser
     * @return array(MTOrder)
     */
    public function GetArrayFromJson()
    {
        $objects = MTJson::Decode($this->ConfigJson);
        if ($objects == null) return null;
        $result = array();
        //---
        foreach ($objects as $obj) {
            $info = MTUserJson::GetFromJson($obj);
            //---
            $result[] = $info;
        }
        //---
        $objects = null;
        //---
        return $result;
    }
}

/**
 * class answer from server for requests about user logins
 */
class MTUserLoginsAnswer
{
    public $RetCode = '-1';
    public $ConfigJson = '';

    /**
     * From json get array logins
     * @return array(int)
     */
    public function GetFromJson()
    {
        $objects = MTJson::Decode($this->ConfigJson);
        if($objects == null) return null;
        $result = array();
        //---
        foreach($objects as $obj)
        {
            //---
            $result[] = (int)$obj;
        }
        //---
        $objects = null;
        //---
        return $result;
    }
}

/**
 * Class answer from server for request user account get
 */
class MTUserAccountAnswer
{
    public $RetCode = '-1';
    public $Login = '';
    public $ConfigJson = '';

    /**
     * From json get class MTUser
     * @return MTUser
     */
    public function GetFromJson()
    {
        $obj = MTJson::Decode($this->ConfigJson);
        if($obj == null) return null;
        $result = new MTAccount();
        //---
        $result->Login             = (int)$obj->Login;
        $result->CurrencyDigits    = (int)$obj->CurrencyDigits;
        $result->Balance           = (float)$obj->Balance;
        $result->Credit            = (float)$obj->Credit;
        $result->Margin            = (float)$obj->Margin;
        $result->MarginFree        = (float)$obj->MarginFree;
        $result->MarginLevel       = (float)$obj->MarginLevel;
        $result->MarginLeverage    = (int)$obj->MarginLeverage;
        $result->Profit            = (float)$obj->Profit;
        $result->Storage           = (float)$obj->Storage;
        $result->Commission        = (float)$obj->Commission;
        $result->Floating          = (float)$obj->Floating;
        $result->Equity            = (float)$obj->Equity;
        $result->SOActivation      = (int)$obj->SOActivation;
        $result->SOTime            = (int)$obj->SOTime;
        $result->SOLevel           = (float)$obj->SOLevel;
        $result->SOEquity          = (float)$obj->SOEquity;
        $result->SOMargin          = (float)$obj->SOMargin;
        if(isset($obj->Assets))
            $result->Assets         = (float)$obj->Assets;
        if(isset($obj->Liabilities))
            $result->Liabilities    = (float)$obj->Liabilities;
        $result->BlockedCommission = (float)$obj->BlockedCommission;
        $result->BlockedProfit     = (float)$obj->BlockedProfit;
        $result->MarginInitial     = (float)$obj->MarginInitial;
        $result->MarginMaintenance = (float)$obj->MarginMaintenance;
        //---
        $obj = null;
        //---
        return $result;
    }

    /**
     * From json get class MTUser
     * @return array(MTOrder)
     */
    public function GetArrayFromJson()
    {
        $objects = MTJson::Decode($this->ConfigJson);
        if ($objects == null) return null;
        $result = array();
        //---
        foreach ($objects as $obj) {
            $info = MTAccountJson::GetFromJson($obj);
            //---
            $result[] = $info;
        }
        //---
        $objects = null;
        //---
        return $result;
    }
}

/**
 * activation method
 */
class MTEnSoActivation
{
    const ACTIVATION_NONE        = 0;
    const ACTIVATION_MARGIN_CALL = 1;
    const ACTIVATION_STOP_OUT    = 2;
    //---
    const ACTIVATION_FIRST = ACTIVATION_NONE;
    const ACTIVATION_LAST = ACTIVATION_STOP_OUT;
}

/**
 * Trade account interface
 */
class MTAccount
{
    /**
     * login
     * @var int
     */
    public $Login;
    /**
     * currency digits
     * @var int
     */
    public $CurrencyDigits;
    /**
     * balance
     * @var double
     */
    public $Balance;
    /**
     * credit
     * @var double
     */
    public $Credit;
    /**
     * margin
     * @var double
     */
    public $Margin;
    /**
     * free margin
     * @var double
     */
    public $MarginFree;
    /**
     * margin level
     * @var double
     */
    public $MarginLevel;
    /**
     * margin leverage
     * @var int
     */
    public $MarginLeverage;
    /**
     * floating profit
     * @var double
     */
    public $Profit;
    /**
     * storage
     * @var double
     */
    public $Storage;
    /**
     * commission
     * @var double
     */
    public $Commission;
    /**
     * cumulative floating
     * @var double
     */
    public $Floating;
    /**
     * equity
     * @var double
     */
    public $Equity;
    /**
     * stop-out activation mode
     * @var MTEnSoActivation
     */
    public $SOActivation;
    /**
     * stop-out activation time
     * @var int
     */
    public $SOTime;
    /**
     * margin level on stop-out
     * @var double
     */
    public $SOLevel;
    /**
     * equity on stop-out
     * @var double
     */
    public $SOEquity;
    /**
     * margin on stop-out
     * @var double
     */
    public $SOMargin;
    /**
     * account assets
     * @var double
     */
    public $Assets;
    /**
     * account liabilities
     * @var double
     */
    public $Liabilities;
    /**
     * blocked daily & monthly commission
     * @var double
     */
    public $BlockedCommission;
    /**
     * blocked fixed profit
     * @var double
     */
    public $BlockedProfit;
    /**
     * account initial margin
     * @var double
     */
    public $MarginInitial;
    /**
     * account maintenance margin
     * @var double
     */
    public $MarginMaintenance;
}
