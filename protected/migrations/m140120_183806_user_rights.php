<?php

class m140120_183806_user_rights extends CDbMigration
{

    private function _getUser($username)
    {
        $user = User::getByUserName($username);

        if (!$user instanceof User)
        {
            throw new exception('User not found can not continue!');
        }

        return $user;
    }

    private function _addAuthority()
    {
        $params = array(
            'username' => 'bone_auth',
            'password' => md5('b0n3_aut8'),
            'password_hash' => md5('hash_auth'),
            'first_name' => 'Bone',
            'last_name' => 'Authority',
            'email' => 'orban.laszlo@yahoo.com',
            'status_id' => UserStatus::getIdByLabel(UserStatus::ACTIVE),
        );

        $this->insert('user', $params);

        $user = $this->_getUser('bone_auth');

        $this->insert('assignments', array('userid' => $user->id, 'itemname' => Items::ROLE_AUTHORITY));

    }

    private function _removeAuthority()
    {
        $user = $this->_getUser('bone_auth');

        $this->delete('assignments', 'userid =:id AND itemname =:itemname', array(':id' => $user->id, ':itemname' => Items::ROLE_AUTHORITY));
        $this->delete('user', 'id =:id', array(':id' => $user->id));
    }

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $user = $this->_getUser('boneshaker_admin');

        $this->delete('assignments', 'userid =:userid AND itemname =:itemname',
            array(':userid' => $user->id, ':itemname' => Items::ROLE_AUTHORITY)
        );

        $this->_addAuthority();
	}

	public function safeDown()
	{
        $user = $this->_getUser('boneshaker_admin');
        $this->insert('assignments', array('userid' => $user->id, 'itemname' => Items::ROLE_AUTHORITY));

        $this->_removeAuthority();
	}

}