
$app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
               array(
                'pdo.server' => array(
                   'driver'   => 'pgsql',
                   'user' => "xmmutkkqfftoxs",
                   'password' => "66872be8b5b4f4677cb34f033b54c18f7b8205e1a133eba23adeb99d882e40ab",
                   'host' => "ec2-54-221-214-3.compute-1.amazonaws.com",
                   'port' =>  "5432",
                   'dbname' => "d9f424d1vt6cmt")
                   )
               )
);

$app->get('/db/', function() use($app) {
  $st = $app['pdo']->prepare('SELECT name FROM test_table');
  $st->execute();

  $names = array();
  while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
    $app['monolog']->addDebug('Row ' . $row['name']);
    $names[] = $row;
  }

  return $app['twig']->render('database.twig', array(
    'names' => $names
  ));
});
