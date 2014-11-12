class server::php53 {
  require server::yum
  require server::php53::uninstall

  class { 'server::phpius':
    ius_php_version => 'php53u',
    memcache_package => 'memcache',
    with_apc => true,
  }

  class server::php53::uninstall {
     package{ ['php', 'php54', 'php55u', 'php56u']: ensure => absent }
  }
}