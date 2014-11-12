class server::db (
  $ip_addresses
) {

  class { 'mysql::server':
    root_password => '',
    override_options => {
      'mysqld' => {
        'bind-address' => '0.0.0.0',
      },
      'users' => {
        "root@$ip" => {
          ensure => "present",
          max_connections_per_hour => '0',
          max_queries_per_hour     => '0',
          max_updates_per_hour     => '0',
          max_user_connections     => '0',
          password_hash => '',
        },
        "root@192.168.56.1" => {
          ensure => "present",
          max_connections_per_hour => '0',
          max_queries_per_hour     => '0',
          max_updates_per_hour     => '0',
          max_user_connections     => '0',
          password_hash => '',
        },
      },
      'grants' => {
        "root@$ip" => {
          ensure     => 'present',
          options    => ['GRANT'],
          privileges => ['ALL'],
          user       => "root@$ip",
        },
        "root@192.168.56.1" => {
          ensure     => 'present',
          options    => ['GRANT'],
          privileges => ['ALL'],
          user       => "root@192.168.56.1",
        }
      }
    }
  }
}