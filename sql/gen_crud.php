<?php

$tables = array();
$schema = array();
$schema_file = "schema.xml";

function start_element( $parser, $name, $attribs )
{
    global $tables;

    if( $name == "TABLE" )
    {
        $table = array();
        $fields = array();

        $table['name'] = $attribs['NAME'];
        $table['fields'] = array();

        $tables[] = $table;
    }

    if( $name == "FIELD" )
    {
        $field = array();
        $field['name'] = $attribs['NAME'];
        $field['type'] = $attribs['TYPE'];
        $field['pk'] = ( $attribs['PRIMARY-KEY'] == "true" ) ? 1 : 0;
        $tables[count($tables)-1]['fields'][] = $field;
    }
}


function end_element( $parser, $name ) { }


$parser = xml_parser_create();
xml_set_element_handler( $parser, "start_element", "end_element" );
$schema = file( $schema_file );
foreach( $schema as $line )
    xml_parse( $parser, $line );
xml_parser_free( $parser );

ob_start();

echo( "<?php\n" );
?>
require_once( "db_connect.php" );

<?php

foreach( $tables as $table )
{
    $pk = null;
    $updsets = array();
    $updfields = array();
    $insfields = array();
    $insvalues = array();
    $insvars = array();

    foreach( $table['fields'] as $field )
    {
        $insfields[] = $field['name'];
        if( $field['pk'] )
        {
            $pk = $field['name'];
            $insvalues[] = 0;
        }
        else
        {
            $updsets[] = $field['name']."=\"%s\"";
            $updfields[] = '$this->'.$field['name'];
            $insvalues[] = "\"%s\"";
            $insvars[] = '$this->'.$field['name'];
        }
    }

    $insvars = join( ", ", $insvars );
    $insvalues = join( ", ", $insvalues );
    $insfields = join( ", ", $insfields );
    $updfields[] = '$this->'.$pk;
    $updfields = join( ", ", $updfields );
    $updsets = join( ", ", $updsets );
    $class_name = eregi_replace( " ", "", ucwords( eregi_replace( "_", " ", $table['name'] ) ) );  // camel-case

?>

class <?php echo $class_name; ?> {

<?php
    foreach( $table['fields'] as $field )
    {
?>
    var $<?php echo( $field['name'] ); ?>;
<?php
    }
?>

    function __construct($attributes = NULL)
    {
			switch( gettype($attributes) )
			{
				case "array":
					foreach($attributes as $key => $value) 
					{
						$this->$key= mysql_real_escape_string(trim($value));
					}
				break;

				case "integer":
					$id= $attribute;
					$this->load($id);
				break;

				default:
					$this->id = NULL;
			}
    }

    function load( $id )
    {
        $query = "SELECT * FROM <?php echo( $table['name'] ); ?> WHERE <?php echo( $pk ); ?> = " . $id;
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        $row = mysql_fetch_array( $result );
				foreach($row as $key => $value) 
				{
					$this->$key = $value;
				}
    }

<?php
foreach( $table['fields'] as $field )
{
?>
    function get_<?php echo( $field['name'] ); ?>()
    {
        return $this-><?php echo( $field['name'] ); ?>;
    }

    function set_<?php echo( $field['name'] ); ?>( $val )
    {
        $this-><?php echo( $field['name'] ); ?> = $val;
    }

<?php
}
?>

    function update()
    {
        if( $this->id != null && $this->id != "null" )
            $this->updateRecord();
        else
            $this->insertRecord();
    }

    function insertRecord()
    {
        $query = 'INSERT INTO <?php echo( $table['name'] ); ?> ( <?php echo( $insfields ); ?> ) VALUES ( <?php echo( $insvalues ); ?> )';
        $query = sprintf( $query, <?php echo( $insvars ); ?> );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function updateRecord()
    {
        $query = 'UPDATE <?php echo( $table['name'] ); ?> SET <?php echo( $updsets ); ?> WHERE <?php echo( $pk ); ?> = %s';
        $query = sprintf( $query, <?php echo( $updfields ); ?> );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function deleteRecord( $id )
    {
        $query = "DELETE FROM <?php echo( $table['name'] ); ?> WHERE <?php echo( $pk); ?> = $id";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function get_num_rows()
    {
       $temp = mysql_query( "SELECT SQL_CALC_FOUND_ROWS * FROM <?php echo( $table['name'] ); ?> LIMIT 1" );
       $result = mysql_query( "SELECT FOUND_ROWS()" );
       $total = mysql_fetch_row( $result );
       return $total[0];
    }

    function get_ids()
    {
        $ids = array();
        $query = "SELECT id FROM <?php echo( $table['name'] ); ?>";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        while( $row = mysql_fetch_array( $result ) )
            $ids[] = $row['id'];
        return $ids;
    }
}

<?php
}
echo( "?>\n" );

$php = ob_get_clean();

$fh = fopen( "class.DentoneDB.php", "w" );
fwrite( $fh, $php );
fclose( $fh );

?>
