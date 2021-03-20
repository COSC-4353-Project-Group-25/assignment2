
<?php
include: loginModule.php;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
	public function testWrongUserName(){
		$loginObj = new loginMod;
		$this->assertFalse($loginObj->validUsername('incorrect'));
	}
	public function testValidUsername(){
		$loginObj = new loginMod;
		$this->assertTrue($loginObj->validUsername('username1'));
	}
	public function testCorrectCredentials(){
		$loginObj = new loginMod;
		$this->assertTrue($loginObj->correctCredentials('username1','password1'));
	}
	public function testIncorrectCredentials(){
		$loginObj = new loginMod;
		$this->assertFalse($loginObj->(correctCredentials('username1','incorrect'));
	}
	public function testIncorrectLogin(){
		$loginObj = new loginMod;
		$this->assertFalse($loginObj->login('wrong','wrong');
	}
	public function testCorrectLogin(){
		$loginObj = new loginMod;
		$this->assertTrue($loginObj->login('username1','password1');
	}


}

?>
