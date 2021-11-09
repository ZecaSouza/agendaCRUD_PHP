<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");
    
    $data = $_POST;

        //Modificação de dados no banco//
    if(!empty($data)){


        if($data["type"] === "create"){
            $name = $data["name"];
            $phone = $data["phone"];
            $observation = $data["observation"];

            $querry = "INSERT INTO contacts (name, phone, observation) VALUES (:name, :phone, :observation)";
            
            $stmt = $conn->prepare($querry);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observation", $observation);

            try{
                $stmt->execute();
                $_SESSION["msg"] = "CONTATO ADICIONADO COM SUCESSO";
            
            } catch(PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo "Error: $error"; 
            }

        }else if($data["type"] === "edit"){

            $name = $data["name"];
            $phone = $data["phone"];
            $observation = $data["observation"];
            $id = $data["id"];

            $query = "UPDATE contacts SET name = :name, phone = :phone, observation = :observation WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam("name", $name);
            $stmt->bindParam("phone", $phone);
            $stmt->bindParam("observation", $observation);
            $stmt->bindParam("id", $id);

            try{
                $stmt->execute();
                $_SESSION["msg"] = "CONTATO ATUALIZADO COM SUCESSO";
            
            } catch(PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo "Error: $error"; 
            }


        } else if($data["type"] === "delete"){

            $id = $data["id"];

            $query = "DELETE FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);


            try{
                $stmt->execute();
                $_SESSION["msg"] = "CONTATO DELETADO COM SUCESSO";
            
            } catch(PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo "Error: $error"; 
            }

        }
        // volta pra pagina inicial

        header("Location: " . $BASE_URL . "../index.php");

        // seleção de dados//
    } else {
        $id;

        if(!empty($_GET)){
            $id = $_GET["id"];
        }
    
        if(!empty($id)){
    
            $query = "SELECT * FROM contacts WHERE id =  :id";
    
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":id", $id);
    
            $stmt->execute();
    
            $contact = $stmt->fetch();
    
        }else{
    
            $contacts = [];
    
            $query = "SELECT * FROM contacts";
        
            $stmt = $conn->prepare($query);
        
            $stmt->execute();
        
            $contacts = $stmt->fetchAll();
        }
    
        // retorna todos os contatos
        $contacts = [];
    
        $query = "SELECT * FROM contacts";
    
        $stmt = $conn->prepare($query);
    
        $stmt->execute();
    
        $contacts = $stmt->fetchAll();
    }

   //fechar conexão

   $conn = null;