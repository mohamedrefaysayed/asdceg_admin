<?php
public function {functionName}(){
    $pageConfigs = [
        'theme' => 'dark',
        'navbarColor' => 'bg-primary',
        'navbarType' => 'static',
        'footerType' => 'sticky',
        'bodyClass' => 'testClass'
    ];

    return view('/pages/testPage', [
        'pageConfigs' => $pageConfigs
    ]);
}