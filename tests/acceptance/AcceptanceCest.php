<?php

use PHPUnit\Framework\Assert;

class AcceptanceCest
{
    public function iDoSetupBeforeRunningTests(AcceptanceTester $I)
    {
        $I->cli(['core', 'update-db']);
        $I->cli(['theme ', 'install', 'twentyseventeen', '--activate']);
    }

    // tests
    public function iSeePostName(AcceptanceTester $I)
    {
        global $wp_version;
        Assert::assertGreaterThan(5, $wp_version);
        $I->amOnPage('/');
        $I->see('Hello world!');
    }

    public function iActivatePlugin(AcceptanceTester $I)
    {
        $I->loginAsAdmin();
        $I->amOnPluginsPage();
        $I->activatePlugin('example-plugin');
    }

    public function iSeePostNameAgain(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('!dlrow olleH');
    }
}
