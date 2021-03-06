<?php

	namespace core;

	abstract class Model {

		abstract public static function tableName();

		abstract public static function primaryKey(); // return string

		abstract public static function attributes(); // return array

		public function primaryValue() {

			return $this->{static::primaryKey()};
		}

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

		public function update($attr_keys) {

			$table_name = static::tableName();
			$primary_key = static::primaryKey();
			$primary_value = $this->primaryValue();

			$sql = implode(", ", array_map(function($attr) {
				return "$attr = :$attr";
			}, $attr_keys));

			$statement = self::prepare("UPDATE $table_name SET $sql WHERE $primary_key = $primary_value");

			foreach ($attr_keys as $key) {
				$statement->bindValue(":$key", $this->{$key});
			}

			$statement->execute();
		}

		public static function delete($params) {

			$table_name = static::tableName();
			$attr_keys = array_keys($params);

			$cond = implode(" AND ", array_map(function ($attr) {
				return "$attr = :$attr";
			}, $attr_keys));

			$statement = self::prepare("DELETE FROM $table_name WHERE $cond");

			foreach ($params as $key => $value) {
				$statement->bindValue(":$key", $value);
			}

			$statement->execute();
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

		public static function prepare($sql) {

			return Application::$app->db->pdo->prepare($sql);
		}
	}

?>