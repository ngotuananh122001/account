<?php

	namespace core;

	abstract class Model {

		abstract public static function tableName();

		abstract public function attributes(); // return array

		abstract public static function primaryKey(); // return string

		public function create() {

			$table_name = $this->tableName();
			$attributes = $this->attributes();
			$params = array_map(function ($attr) {
				return ":$attr";
			}, $attributes);

			$sql = "INSERT INTO $table_name (" . implode(',', $attributes) . ")
					VALUES (" . implode(',', $params) .");";

			$statement = self::prepare($sql);

			foreach ($attributes as $attr) {
				$statement->bindValue(":$attr", $this->{$attr});
			}

			$statement->execute();
			return true;
		}

		public static function findOne($params) {

			$table_name = static::tableName();
			$attr_keys = array_keys($params);

			$cond = implode(" AND ", array_map(function ($attr) {
				return "$attr = :$attr";
			}, $attr_keys));

			$statement = self::prepare("SELECT * FROM $table_name WHERE $cond");

			foreach ($params as $key => $value) {
				$statement->bindValue(":$key", $value);
			}

			$statement->execute();
			return $statement->fetchObject(static::class);
		}

		public static function update($attributes, $primary_value) {

			$table_name = static::tableName();
			$primary_key = static::primaryKey();

			$attr_keys = array_keys($attributes);

			$sql = implode(", ", array_map(function($attr) {
				return "$attr = :$attr";
			}, $attr_keys));

			$statement = self::prepare("UPDATE $table_name SET $sql WHERE $primary_key = $primary_value");

			foreach ($attributes as $key => $value) {
				$statement->bindValue(":$key", $value);
			}

			$statement->execute();
		}

		public static function prepare($sql) {

			return Application::$app->db->pdo->prepare($sql);
		}
	}

?>