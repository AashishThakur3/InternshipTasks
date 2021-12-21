<?php 

    class HomeModel extends Model {
        public function index() {
            $this->query('SELECT * FROM productdetails');
            $rows = $this->resultSet();
            return $rows;
        }

        public function add() {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // **************** FILE UPLOAD ***************
                $file_name = $_FILES["image"]["name"];
                $file_type = $_FILES["image"]["type"];
                $file_size = $_FILES["image"]["size"];
                $file_tmp_name = $_FILES["image"]["tmp_name"];
                $file_error = $_FILES["image"]["error"];
                $imagedir = 'images/';
                $stem=substr($file_name,0,strpos($file_name,'.'));
                $extension = substr($file_name, strpos($file_name,'.'), strlen($file_name)-1);
                $upload = $imagedir . $stem.$extension;
                // ***************************************************

                $this->query('INSERT INTO productdetails(product_name,descriptions,price,quantity,images) VALUES(:title, :description, :author_name, :author_email, :image)');
                $this->bind(':product_name', $post['product_name']);
                $this->bind(':descriptions', $post['descriptions']);
                $this->bind(':price', $post['price']);
                $this->bind(':quantity', $post['quantity']);
                $this->bind(':images', $file_name);

                move_uploaded_file($_FILES['image']['tmp_name'], $upload);

                $this->execute();
                // VERIFY
                if($this->lastInsertId()) {
                    header('Location: '. ROOT_URL);
                }
            }
            return;
        }

        public function delete() {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $id = $_POST["delete_id"];
                $this->query('DELETE from productdetails where id=:id');
                $this->bind(':id', $id);
                $this->execute();

                header('Location: '. ROOT_URL);
            }
            return;
        }

        public function update() {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_SERVER["REQUEST_METHOD"] == "POST") {

                $this->query('UPDATE productdetails SET product_name=:product_name, descriptions=:descriptions, price=:price, quantity=:quantity WHERE id=:id');
                $this->bind(':product_name', $post['edit_name']);
                $this->bind(':descriptions', $post['edit_description']);
                $this->bind(':price', $post['edit_price']);
                $this->bind(':quantity', $post['edit_quantity']);
                $this->bind(':id', $post['update_id']);

                $this->execute();
                header('Location: '. ROOT_URL);

            }
            return;
        }

    }

?>