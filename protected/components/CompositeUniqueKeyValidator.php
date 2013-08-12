<?php
 
 
/**
 * CompositeUniqueKeyValidator class file.
 */
class CompositeUniqueKeyValidator extends CValidator {
    /**
     * @var string comma separated columns that are unique key
     */
    public $keyColumns;
 
    public $errorMessage = 'Maaf, data "{columns_labels}" sudah ada dalam database. Silahkan cek kembali!';
 
    /**
     * @var boolean whether the error message should be added to all of the columns
     */
    public $addErrorToAllColumns = false;
 
    /**
     * @param CModel $object the object being validated
     * @param string $attribute if there is an validation error then error message
     * will be added to this property
     */
    protected function validateAttribute($object, $attribute) {
        $class = get_class($object);
        Yii::import($class);
 
        $keyColumns = explode(',', $this->keyColumns);
        if (count($keyColumns) == 1) {
            throw new CException('CUniqueValidator should be used instead');
        }
        $columnsLabels = $object->attributeLabels();
 
        $criteria = new CDbCriteria();
        $keyColumnsLabels = array();
        foreach ($keyColumns as &$column) {
            $column = trim($column);
            $criteria->compare($column, $object->$column);
            $keyColumnsLabels[] = $columnsLabels[$column];
        }
        unset($column);
        $criteria->limit = 1;
 
        if ($class::model()->count($criteria)) {
            $message = Yii::t('yii', $this->errorMessage, array(
                '{columns_labels}' => join(', ', $keyColumnsLabels)
            ));
            if ($this->addErrorToAllColumns) {
                foreach ($keyColumns as $column) {
                    $this->addError($object, $column, $message);
                }
            }
            else {
                $this->addError($object, $attribute, $message);
            }
        }
    }
 
}
 
 
 
?>

