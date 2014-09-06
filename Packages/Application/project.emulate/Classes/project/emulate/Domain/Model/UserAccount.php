<?php
namespace project\emulate\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "project.emulate".       *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class UserAccount {

	/**
	 * @var string
	 * @Flow\Validate(type="StringLength", options={ "minimum"=3, "maximum"=80 })
	 */
	protected $name;

	/**
	 * @var string
	 * @Flow\Validate(type="StringLength", options={ "minimum"=3, "maximum"=80 })
	 * @Flow\Identity
	 */
	protected $username;

	/**
	 * @var string
	 */
	protected $password;

	/**
	 * @var string
	 * @Flow\Identity
	 * @Flow\Validate(type="EmailAddress")
	 */
	protected $email;

	/**
	 * @var string
	 */
	protected $gender;

	/**
	 * @var string
	 */
	protected $profilePic;

	/**
	 * emulatr to load
	 * @var string
	 */
	protected $emulatorPreference = NULL;

	/**
	 * emulator mode
	 * @var boolean
	 */
	protected $emulatorMode = 0;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getgender() {
		return $this->gender;
	}

	/**
	 * @param string $gender
	 * @return void
	 */
	public function setgender($gender) {
		$this->gender = $gender;
	}

	/**
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param string $username
	 * @return void
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param string $password
	 * @return void
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getProfilePic() {
		return $this->profilePic;
	}

	/**
	 * @param string $profilePic
	 * @return void
	 */
	public function setProfilePic($profilePic) {
		$this->profilePic = $profilePic;
	}

	/**
	 * @return string
	 */
	public function getEmulatorPreference() {
		return $this->emulatorPreference;
	}

	/**
	 * @param string $emulatorPreference
	 * @return void
	 */
	public function setEmulatorPreference($emulatorPreference) {
		$this->emulatorPreference = $emulatorPreference;
	}

	/**
	 * @return string
	 */
	public function getEmulatorMode() {
		return $this->emulatorMode;
	}

	/**
	 * @param string $emulatorMode
	 * @return void
	 */
	public function setEmulatorMode($emulatorMode) {
		$this->emulatorMode = $emulatorMode;
	}

	/**
	 * validation of inputs
	 * @param project\emulate\Domain\Repository\UserAccountRepository
	 * @param project\emulate\Domain\Model\User
	 */
	public function Validate($userAccountRepository, $user) {
		$error = TRUE;
		$query = $userAccountRepository->createQuery();
		$query->matching(
			$query->equals('username', $this->getUsername())
		);
		$result = $query->execute();
		if($result->count() == 1) {
			$user->setProperty(['UsernameRegistrationError'=>'Username Exists']);
			$user->setProperty(['registrationform'=>$this]);
			$error = FALSE;
		}
		$query = $userAccountRepository->createQuery();
		$query->matching(
			$query->equals('email', $this->getEmail())
		);
		$result = $query->execute();
		if($result->count() == 1) {
			$user->setProperty(['EmailRegistrationError'=>'Email Exists']);
			$user->setProperty(['registrationform'=>$this]);
			$error = FALSE;
		}
		if(strlen($this->getPassword()) <= 3) {
			$error = FALSE;
			$user->setProperty(['PasswordRegistrationError'=>'Password must be atleast 4 characters long']);
			$user->setProperty(['registrationform'=>$this]);
		}
		return $error;
	}

}