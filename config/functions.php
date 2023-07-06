    <?php
    
    /**
     * Permet de se connecter à la BDD
     */
    function db(): PDO {
        $db = new PDO('mysql:host=localhost;dbname=movies', 'root', '');

        return $db;
    }

    /**
     * Transformer un CSV en tableau PHP
     */
    function convertCsvToArray(string $file): array {
        $file = fopen($file, 'r');

        $data = [];

        $headers = fgetcsv($file, null, ';');
        while ($line = fgetcsv($file, null, ';')) {

            $item = [];

            foreach ($line as $key => $value) {
                $item[$headers[$key]] = $value;
            }

            $data[] = $item;
        }

        return $data;
    }

    function console($data) {
        $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    function export($path){

    }


    ?>