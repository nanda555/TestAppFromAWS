{$app = gcr::getApp()}
{$app->checkForAlternateLogin()}

    <div class="sidebar-header"><h3>{str tag="login"}{contextualhelp plugintype='core' pluginname='core' section='loginbox'}</h3></div>
    <div class="sidebar-content">
        <noscript><p>{str tag="javascriptnotenabled"}</p></noscript>
        <div id="loginform_container">{$sbdata.loginform|safe}</div>
    </div>
