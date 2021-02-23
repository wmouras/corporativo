<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate;

class LdapController extends Controller
{

    public $conn, $config;

	public function __construct()
    {
		$this->config = [
			'host' => env('LDAP_HOST', '10.150.200.10'),
			'base_dn' => env('LDAP_BASE_DN', 'dc=crea-df,dc=org,dc=br'),
			'account_suffix' => env('LDAP_ACCOUNT_SUFFIX', '@crea-df.org.br'),
			'port' => env('LDAP_PORT', 389)
		];
	}

	public function auth($uname, $pwd)
	{
		$this->conn = ldap_connect($this->config['host']);
		$bindDn = $uname."@crea-df.org.br";
		ldap_set_option($this->conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($this->conn, LDAP_OPT_REFERRALS, 0);
		if (ldap_bind($this->conn, $bindDn, $pwd)) {
			return $this->directoryEntry($uname);
		}
		return false;
	}

	public function directoryEntry($username)
	{
		// $columns = ['givenname', 'sn', 'mail', 'uid', 'cn'];
		// $filter = "(uid=".$username.")";
		$query = ldap_search($this->conn, "CN=USERS,DC=CREA-DF,DC=ORG,DC=BR",  "(samaccountname=".$username.")");

        // Read all results from search
        $data = ldap_get_entries($this->conn, $query);
        foreach( $data[0]['memberof'] as $grupo ) {
            $temp[] = $grupo;
        }
		ldap_unbind($this->conn);
		return $temp;
	}
}
