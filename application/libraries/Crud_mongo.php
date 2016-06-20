<?php
class Crud_mongo {

	private $con;
	private $db = "codeigniter";
	private $col = "records";

	function __construct() {
		$this -> wc = new MongoDB\Driver\WriteConcern(
			// Guarantee that writes are acknowledged by a majority of our nodes
			MongoDB\Driver\WriteConcern::MAJORITY,
			// But only wait 1000ms because we have an application to run!
			1000
			);
			
				// Construct a read preference
		$this -> rp = new MongoDB\Driver\ReadPreference(
		    /* We prefer to read from a secondary, but are OK with reading from the
		     * primary if necessary (e.g. secondaries are offline) */
		    MongoDB\Driver\ReadPreference::RP_SECONDARY_PREFERRED,
		    // Specify some tag sets for our preferred nodes
		    []
		);
		
		$this -> con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	}

	function echoTest() {
		$listdatabases = new MongoDB\Driver\Command(["listDatabases" => 1]);
		$result = $this->con->executeCommand("admin", $listdatabases);

		$databases     = current($result->toArray());
		var_dump($databases);

	}
	
	function addRecord($data){
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->insert($data);

		try {
		/* Specify the full namespace as the first argument, followed by the bulk
		* write object and an optional write concern. MongoDB\Driver\WriteResult is
		* returned on success; otherwise, an exception is thrown. */
		$result = $this->con->executeBulkWrite( $this->db . "." . $this ->col, $bulk, $this->wc);
		var_dump($result);
		} catch (MongoDB\Driver\Exception\Exception $e) {
		echo $e->getMessage(), "\n";
		}
		}
	
	function readAll(){
		$query = new MongoDB\Driver\Query([ 'hello' => 'world'] );
		
		try {
		/* Specify the full namespace as the first argument, followed by the query
		* object and an optional read preference. MongoDB\Driver\Cursor is returned
		* success; otherwise, an exception is thrown. */
		$cursor = $this -> con->executeQuery( $this->db . "." . $this ->col, $query, $this -> rp);
		
		// Iterate over all matched documents
		foreach ($cursor as $document) {
		var_dump($document);
		}
		} catch (MongoDB\Driver\Exception\Exception $e) {
		echo $e->getMessage(), "\n";
		}
	}
	
	function getItem($id){
		$query = new MongoDB\Driver\Query([ '_id' =>  $id] );
		
		try {
		/* Specify the full namespace as the first argument, followed by the query
		* object and an optional read preference. MongoDB\Driver\Cursor is returned
		* success; otherwise, an exception is thrown. */
		$cursor = $this -> con->executeQuery( $this->db . "." . $this ->col, $query, $this -> rp);
		
		// Iterate over all matched documents
		foreach ($cursor as $document) {
		var_dump($document);
		}
		} catch (MongoDB\Driver\Exception\Exception $e) {
		echo $e->getMessage(), "\n";
		}
	}

		}
	