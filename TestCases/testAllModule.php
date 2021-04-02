
<?php
include: loginModule.php;
include: editProfile.php;
include: fuelQuoteHistModule.php;
include: fuelQuoteModule.php;
include: registration.php;
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
	public function testLogin(){
		$loginObj = new loginMod;
		$this->assertTrue($loginObj->login('username1','password1'));
		$this->assertFalse($loginObj->login('wrong','wrong'));
	}
	public function testEditProfile(){
		$editObj = new 	editProfMod;
		$this->assertTrue($editObj->edit('name','address1','address2','city','state','12345'));
		$this->assertFalse($editObj->edit('name!!','address1','address2','city','state','12345'));
		$this->assertFalse($editObj->edit('name','address1','address2','city!!!','state','12345'));
		$this->assertFalse($editObj->edit('name','address1','address2','city','state!!!','12345'));
		$this->assertFalse($editObj->edit('name','address1','address2','city','state','12345dasdasd'));
		$this->assertFalse($editObj->edit(null,'address1','address2','city','state','12345'));
		}
	public function testFuelQuoteHistory(){
		$histObj = new fuelQuoteHistMod;
		$this->assertTrue($histObj->hist('text.txt'));
		$this->assertFalse($histObj->hist('notAFile.txt'));
	}
	public function testFuelQuote(){
		$quoteObj = new fuelQuoteMod;
		$this->assertTrue($quoteObj->quote('6 gallons','02/12/2022'));
		$this->assertFalse($quoteObj->quote(null,null));
	}
	public function testRegister(){
		$regObj = new registration;
		$this->assertFalse($regObj->register('uniqueRegistration','actualPassword'));
		$this->assertFalse($regObj->register(null,null));
		$this->assertTrue($regObj->register('testing','again'));
	}

}

?>
