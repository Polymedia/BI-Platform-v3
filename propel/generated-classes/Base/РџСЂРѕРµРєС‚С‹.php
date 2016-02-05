<?php

namespace Base;

use \Предписания as ChildПредписания;
use \ПредписанияQuery as ChildПредписанияQuery;
use \Проекты as ChildПроекты;
use \ПроектыQuery as ChildПроектыQuery;
use \датыобновленийдашбордов as Childдатыобновленийдашбордов;
use \датыобновленийдашбордовQuery as ChildдатыобновленийдашбордовQuery;
use \мобилизация as Childмобилизация;
use \мобилизацияQuery as ChildмобилизацияQuery;
use \мобилизацияпомесяцам as Childмобилизацияпомесяцам;
use \мобилизацияпомесяцамQuery as ChildмобилизацияпомесяцамQuery;
use \мтр as Childмтр;
use \мтрQuery as ChildмтрQuery;
use \проблемныевопросы as Childпроблемныевопросы;
use \проблемныевопросыQuery as ChildпроблемныевопросыQuery;
use \программы as Childпрограммы;
use \программыQuery as ChildпрограммыQuery;
use \участкиработ as Childучасткиработ;
use \участкиработQuery as ChildучасткиработQuery;
use \Exception;
use \PDO;
use Map\ПредписанияTableMap;
use Map\ПроектыTableMap;
use Map\датыобновленийдашбордовTableMap;
use Map\мобилизацияTableMap;
use Map\мобилизацияпомесяцамTableMap;
use Map\мтрTableMap;
use Map\проблемныевопросыTableMap;
use Map\программыTableMap;
use Map\участкиработTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'Проекты' table.
 *
 * 
 *
* @package    propel.generator..Base
*/
abstract class Проекты implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ПроектыTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     * 
     * @var        int
     */
    protected $id;

    /**
     * The value for the код_проекта field.
     * 
     * @var        string
     */
    protected $код_проекта;

    /**
     * The value for the проект field.
     * 
     * @var        string
     */
    protected $проект;

    /**
     * The value for the руководитель field.
     * 
     * @var        string
     */
    protected $руководитель;

    /**
     * The value for the заказчик field.
     * 
     * @var        string
     */
    protected $заказчик;

    /**
     * The value for the подрядчики field.
     * 
     * @var        string
     */
    protected $подрядчики;

    /**
     * The value for the период_выполнения_работ field.
     * 
     * @var        string
     */
    protected $период_выполнения_работ;

    /**
     * The value for the детали_проекта field.
     * 
     * @var        string
     */
    protected $детали_проекта;

    /**
     * The value for the тип_строительства field.
     * 
     * @var        string
     */
    protected $тип_строительства;

    /**
     * The value for the название_папки_проекта field.
     * 
     * @var        string
     */
    protected $название_папки_проекта;

    /**
     * The value for the картинка field.
     * 
     * @var        string
     */
    protected $картинка;

    /**
     * The value for the карточка_проекта field.
     * 
     * @var        string
     */
    protected $карточка_проекта;

    /**
     * @var        ObjectCollection|Childдатыобновленийдашбордов[] Collection to store aggregation of Childдатыобновленийдашбордов objects.
     */
    protected $collдатыобновленийдашбордовs;
    protected $collдатыобновленийдашбордовsPartial;

    /**
     * @var        ObjectCollection|Childмтр[] Collection to store aggregation of Childмтр objects.
     */
    protected $collмтрs;
    protected $collмтрsPartial;

    /**
     * @var        ObjectCollection|Childмобилизация[] Collection to store aggregation of Childмобилизация objects.
     */
    protected $collмобилизацияs;
    protected $collмобилизацияsPartial;

    /**
     * @var        ObjectCollection|Childмобилизацияпомесяцам[] Collection to store aggregation of Childмобилизацияпомесяцам objects.
     */
    protected $collмобилизацияпомесяцамs;
    protected $collмобилизацияпомесяцамsPartial;

    /**
     * @var        ObjectCollection|ChildПредписания[] Collection to store aggregation of ChildПредписания objects.
     */
    protected $collПредписанияs;
    protected $collПредписанияsPartial;

    /**
     * @var        ObjectCollection|Childпроблемныевопросы[] Collection to store aggregation of Childпроблемныевопросы objects.
     */
    protected $collпроблемныевопросыs;
    protected $collпроблемныевопросыsPartial;

    /**
     * @var        ObjectCollection|Childпрограммы[] Collection to store aggregation of Childпрограммы objects.
     */
    protected $collпрограммыs;
    protected $collпрограммыsPartial;

    /**
     * @var        ObjectCollection|Childучасткиработ[] Collection to store aggregation of Childучасткиработ objects.
     */
    protected $collучасткиработs;
    protected $collучасткиработsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|Childдатыобновленийдашбордов[]
     */
    protected $�атыобновленийдашбордовsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|Childмтр[]
     */
    protected $�трsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|Childмобилизация[]
     */
    protected $�обилизацияsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|Childмобилизацияпомесяцам[]
     */
    protected $�обилизацияпомесяцамsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildПредписания[]
     */
    protected $�редписанияsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|Childпроблемныевопросы[]
     */
    protected $�роблемныевопросыsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|Childпрограммы[]
     */
    protected $�рограммыsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|Childучасткиработ[]
     */
    protected $�часткиработsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Проекты object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Проекты</code> instance.  If
     * <code>obj</code> is an instance of <code>Проекты</code>, delegates to
     * <code>equals(Проекты)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Проекты The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));
        
        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }
        
        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [код_проекта] column value.
     * 
     * @return string
     */
    public function getкодпроекта()
    {
        return $this->код_проекта;
    }

    /**
     * Get the [проект] column value.
     * 
     * @return string
     */
    public function getпроект()
    {
        return $this->проект;
    }

    /**
     * Get the [руководитель] column value.
     * 
     * @return string
     */
    public function getруководитель()
    {
        return $this->руководитель;
    }

    /**
     * Get the [заказчик] column value.
     * 
     * @return string
     */
    public function getзаказчик()
    {
        return $this->заказчик;
    }

    /**
     * Get the [подрядчики] column value.
     * 
     * @return string
     */
    public function getподрядчики()
    {
        return $this->подрядчики;
    }

    /**
     * Get the [период_выполнения_работ] column value.
     * 
     * @return string
     */
    public function getпериодвыполненияработ()
    {
        return $this->период_выполнения_работ;
    }

    /**
     * Get the [детали_проекта] column value.
     * 
     * @return string
     */
    public function getдеталипроекта()
    {
        return $this->детали_проекта;
    }

    /**
     * Get the [тип_строительства] column value.
     * 
     * @return string
     */
    public function getтипстроительства()
    {
        return $this->тип_строительства;
    }

    /**
     * Get the [название_папки_проекта] column value.
     * 
     * @return string
     */
    public function getназваниепапкипроекта()
    {
        return $this->название_папки_проекта;
    }

    /**
     * Get the [картинка] column value.
     * 
     * @return string
     */
    public function getкартинка()
    {
        return $this->картинка;
    }

    /**
     * Get the [карточка_проекта] column value.
     * 
     * @return string
     */
    public function getкарточкапроекта()
    {
        return $this->карточка_проекта;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param int $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [код_проекта] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setкодпроекта($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->код_проекта !== $v) {
            $this->код_проекта = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_КОД_ПРОЕКТА] = true;
        }

        return $this;
    } // setкодпроекта()

    /**
     * Set the value of [проект] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setпроект($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->проект !== $v) {
            $this->проект = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ПРОЕКТ] = true;
        }

        return $this;
    } // setпроект()

    /**
     * Set the value of [руководитель] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setруководитель($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->руководитель !== $v) {
            $this->руководитель = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_РУКОВОДИТЕЛЬ] = true;
        }

        return $this;
    } // setруководитель()

    /**
     * Set the value of [заказчик] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setзаказчик($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->заказчик !== $v) {
            $this->заказчик = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ЗАКАЗЧИК] = true;
        }

        return $this;
    } // setзаказчик()

    /**
     * Set the value of [подрядчики] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setподрядчики($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->подрядчики !== $v) {
            $this->подрядчики = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ПОДРЯДЧИКИ] = true;
        }

        return $this;
    } // setподрядчики()

    /**
     * Set the value of [период_выполнения_работ] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setпериодвыполненияработ($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->период_выполнения_работ !== $v) {
            $this->период_выполнения_работ = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ПЕРИОД_ВЫПОЛНЕНИЯ_РАБОТ] = true;
        }

        return $this;
    } // setпериодвыполненияработ()

    /**
     * Set the value of [детали_проекта] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setдеталипроекта($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->детали_проекта !== $v) {
            $this->детали_проекта = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ДЕТАЛИ_ПРОЕКТА] = true;
        }

        return $this;
    } // setдеталипроекта()

    /**
     * Set the value of [тип_строительства] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setтипстроительства($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->тип_строительства !== $v) {
            $this->тип_строительства = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ТИП_СТРОИТЕЛЬСТВА] = true;
        }

        return $this;
    } // setтипстроительства()

    /**
     * Set the value of [название_папки_проекта] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setназваниепапкипроекта($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->название_папки_проекта !== $v) {
            $this->название_папки_проекта = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_НАЗВАНИЕ_ПАПКИ_ПРОЕКТА] = true;
        }

        return $this;
    } // setназваниепапкипроекта()

    /**
     * Set the value of [картинка] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setкартинка($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->картинка !== $v) {
            $this->картинка = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_КАРТИНКА] = true;
        }

        return $this;
    } // setкартинка()

    /**
     * Set the value of [карточка_проекта] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setкарточкапроекта($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->карточка_проекта !== $v) {
            $this->карточка_проекта = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_КАРТОЧКА_ПРОЕКТА] = true;
        }

        return $this;
    } // setкарточкапроекта()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ПроектыTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ПроектыTableMap::translateFieldName('кодпроекта', TableMap::TYPE_PHPNAME, $indexType)];
            $this->код_проекта = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ПроектыTableMap::translateFieldName('проект', TableMap::TYPE_PHPNAME, $indexType)];
            $this->проект = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ПроектыTableMap::translateFieldName('руководитель', TableMap::TYPE_PHPNAME, $indexType)];
            $this->руководитель = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ПроектыTableMap::translateFieldName('заказчик', TableMap::TYPE_PHPNAME, $indexType)];
            $this->заказчик = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ПроектыTableMap::translateFieldName('подрядчики', TableMap::TYPE_PHPNAME, $indexType)];
            $this->подрядчики = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ПроектыTableMap::translateFieldName('периодвыполненияработ', TableMap::TYPE_PHPNAME, $indexType)];
            $this->период_выполнения_работ = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ПроектыTableMap::translateFieldName('деталипроекта', TableMap::TYPE_PHPNAME, $indexType)];
            $this->детали_проекта = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ПроектыTableMap::translateFieldName('типстроительства', TableMap::TYPE_PHPNAME, $indexType)];
            $this->тип_строительства = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ПроектыTableMap::translateFieldName('названиепапкипроекта', TableMap::TYPE_PHPNAME, $indexType)];
            $this->название_папки_проекта = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ПроектыTableMap::translateFieldName('картинка', TableMap::TYPE_PHPNAME, $indexType)];
            $this->картинка = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ПроектыTableMap::translateFieldName('карточкапроекта', TableMap::TYPE_PHPNAME, $indexType)];
            $this->карточка_проекта = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = ПроектыTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Проекты'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ПроектыTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildПроектыQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collдатыобновленийдашбордовs = null;

            $this->collмтрs = null;

            $this->collмобилизацияs = null;

            $this->collмобилизацияпомесяцамs = null;

            $this->collПредписанияs = null;

            $this->collпроблемныевопросыs = null;

            $this->collпрограммыs = null;

            $this->collучасткиработs = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Проекты::setDeleted()
     * @see Проекты::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПроектыTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildПроектыQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПроектыTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ПроектыTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->�атыобновленийдашбордовsScheduledForDeletion !== null) {
                if (!$this->�атыобновленийдашбордовsScheduledForDeletion->isEmpty()) {
                    foreach ($this->�атыобновленийдашбордовsScheduledForDeletion as $�атыобновленийдашбордов) {
                        // need to save related object because we set the relation to null
                        $�атыобновленийдашбордов->save($con);
                    }
                    $this->�атыобновленийдашбордовsScheduledForDeletion = null;
                }
            }

            if ($this->collдатыобновленийдашбордовs !== null) {
                foreach ($this->collдатыобновленийдашбордовs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�трsScheduledForDeletion !== null) {
                if (!$this->�трsScheduledForDeletion->isEmpty()) {
                    foreach ($this->�трsScheduledForDeletion as $�тр) {
                        // need to save related object because we set the relation to null
                        $�тр->save($con);
                    }
                    $this->�трsScheduledForDeletion = null;
                }
            }

            if ($this->collмтрs !== null) {
                foreach ($this->collмтрs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�обилизацияsScheduledForDeletion !== null) {
                if (!$this->�обилизацияsScheduledForDeletion->isEmpty()) {
                    \мобилизацияQuery::create()
                        ->filterByPrimaryKeys($this->�обилизацияsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->�обилизацияsScheduledForDeletion = null;
                }
            }

            if ($this->collмобилизацияs !== null) {
                foreach ($this->collмобилизацияs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�обилизацияпомесяцамsScheduledForDeletion !== null) {
                if (!$this->�обилизацияпомесяцамsScheduledForDeletion->isEmpty()) {
                    \мобилизацияпомесяцамQuery::create()
                        ->filterByPrimaryKeys($this->�обилизацияпомесяцамsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->�обилизацияпомесяцамsScheduledForDeletion = null;
                }
            }

            if ($this->collмобилизацияпомесяцамs !== null) {
                foreach ($this->collмобилизацияпомесяцамs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�редписанияsScheduledForDeletion !== null) {
                if (!$this->�редписанияsScheduledForDeletion->isEmpty()) {
                    \ПредписанияQuery::create()
                        ->filterByPrimaryKeys($this->�редписанияsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->�редписанияsScheduledForDeletion = null;
                }
            }

            if ($this->collПредписанияs !== null) {
                foreach ($this->collПредписанияs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�роблемныевопросыsScheduledForDeletion !== null) {
                if (!$this->�роблемныевопросыsScheduledForDeletion->isEmpty()) {
                    foreach ($this->�роблемныевопросыsScheduledForDeletion as $�роблемныевопросы) {
                        // need to save related object because we set the relation to null
                        $�роблемныевопросы->save($con);
                    }
                    $this->�роблемныевопросыsScheduledForDeletion = null;
                }
            }

            if ($this->collпроблемныевопросыs !== null) {
                foreach ($this->collпроблемныевопросыs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�рограммыsScheduledForDeletion !== null) {
                if (!$this->�рограммыsScheduledForDeletion->isEmpty()) {
                    \программыQuery::create()
                        ->filterByPrimaryKeys($this->�рограммыsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->�рограммыsScheduledForDeletion = null;
                }
            }

            if ($this->collпрограммыs !== null) {
                foreach ($this->collпрограммыs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�часткиработsScheduledForDeletion !== null) {
                if (!$this->�часткиработsScheduledForDeletion->isEmpty()) {
                    \участкиработQuery::create()
                        ->filterByPrimaryKeys($this->�часткиработsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->�часткиработsScheduledForDeletion = null;
                }
            }

            if ($this->collучасткиработs !== null) {
                foreach ($this->collучасткиработs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[ПроектыTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ПроектыTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ПроектыTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КОД_ПРОЕКТА)) {
            $modifiedColumns[':p' . $index++]  = 'Код_проекта';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ПРОЕКТ)) {
            $modifiedColumns[':p' . $index++]  = 'Проект';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_РУКОВОДИТЕЛЬ)) {
            $modifiedColumns[':p' . $index++]  = 'Руководитель';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ЗАКАЗЧИК)) {
            $modifiedColumns[':p' . $index++]  = 'Заказчик';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ПОДРЯДЧИКИ)) {
            $modifiedColumns[':p' . $index++]  = 'Подрядчики';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ПЕРИОД_ВЫПОЛНЕНИЯ_РАБОТ)) {
            $modifiedColumns[':p' . $index++]  = 'Период_выполнения_работ';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ДЕТАЛИ_ПРОЕКТА)) {
            $modifiedColumns[':p' . $index++]  = 'Детали_проекта';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ТИП_СТРОИТЕЛЬСТВА)) {
            $modifiedColumns[':p' . $index++]  = 'Тип_строительства';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_НАЗВАНИЕ_ПАПКИ_ПРОЕКТА)) {
            $modifiedColumns[':p' . $index++]  = 'Название_папки_проекта';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КАРТИНКА)) {
            $modifiedColumns[':p' . $index++]  = 'Картинка';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КАРТОЧКА_ПРОЕКТА)) {
            $modifiedColumns[':p' . $index++]  = 'Карточка_проекта';
        }

        $sql = sprintf(
            'INSERT INTO Проекты (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':                        
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'Код_проекта':                        
                        $stmt->bindValue($identifier, $this->код_проекта, PDO::PARAM_STR);
                        break;
                    case 'Проект':                        
                        $stmt->bindValue($identifier, $this->проект, PDO::PARAM_STR);
                        break;
                    case 'Руководитель':                        
                        $stmt->bindValue($identifier, $this->руководитель, PDO::PARAM_STR);
                        break;
                    case 'Заказчик':                        
                        $stmt->bindValue($identifier, $this->заказчик, PDO::PARAM_STR);
                        break;
                    case 'Подрядчики':                        
                        $stmt->bindValue($identifier, $this->подрядчики, PDO::PARAM_STR);
                        break;
                    case 'Период_выполнения_работ':                        
                        $stmt->bindValue($identifier, $this->период_выполнения_работ, PDO::PARAM_STR);
                        break;
                    case 'Детали_проекта':                        
                        $stmt->bindValue($identifier, $this->детали_проекта, PDO::PARAM_STR);
                        break;
                    case 'Тип_строительства':                        
                        $stmt->bindValue($identifier, $this->тип_строительства, PDO::PARAM_STR);
                        break;
                    case 'Название_папки_проекта':                        
                        $stmt->bindValue($identifier, $this->название_папки_проекта, PDO::PARAM_STR);
                        break;
                    case 'Картинка':                        
                        $stmt->bindValue($identifier, $this->картинка, PDO::PARAM_STR);
                        break;
                    case 'Карточка_проекта':                        
                        $stmt->bindValue($identifier, $this->карточка_проекта, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ПроектыTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getкодпроекта();
                break;
            case 2:
                return $this->getпроект();
                break;
            case 3:
                return $this->getруководитель();
                break;
            case 4:
                return $this->getзаказчик();
                break;
            case 5:
                return $this->getподрядчики();
                break;
            case 6:
                return $this->getпериодвыполненияработ();
                break;
            case 7:
                return $this->getдеталипроекта();
                break;
            case 8:
                return $this->getтипстроительства();
                break;
            case 9:
                return $this->getназваниепапкипроекта();
                break;
            case 10:
                return $this->getкартинка();
                break;
            case 11:
                return $this->getкарточкапроекта();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Проекты'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Проекты'][$this->hashCode()] = true;
        $keys = ПроектыTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getкодпроекта(),
            $keys[2] => $this->getпроект(),
            $keys[3] => $this->getруководитель(),
            $keys[4] => $this->getзаказчик(),
            $keys[5] => $this->getподрядчики(),
            $keys[6] => $this->getпериодвыполненияработ(),
            $keys[7] => $this->getдеталипроекта(),
            $keys[8] => $this->getтипстроительства(),
            $keys[9] => $this->getназваниепапкипроекта(),
            $keys[10] => $this->getкартинка(),
            $keys[11] => $this->getкарточкапроекта(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->collдатыобновленийдашбордовs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�атыобновленийдашбордовs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Даты_обновлений_дашбордовs';
                        break;
                    default:
                        $key = 'датыобновленийдашбордовs';
                }
        
                $result[$key] = $this->collдатыобновленийдашбордовs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collмтрs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�трs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'МТРs';
                        break;
                    default:
                        $key = 'мтрs';
                }
        
                $result[$key] = $this->collмтрs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collмобилизацияs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�обилизацияs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Мобилизацияs';
                        break;
                    default:
                        $key = 'мобилизацияs';
                }
        
                $result[$key] = $this->collмобилизацияs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collмобилизацияпомесяцамs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�обилизацияпомесяцамs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Мобилизация_по_месяцамs';
                        break;
                    default:
                        $key = 'мобилизацияпомесяцамs';
                }
        
                $result[$key] = $this->collмобилизацияпомесяцамs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collПредписанияs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�редписанияs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Предписанияs';
                        break;
                    default:
                        $key = 'Предписанияs';
                }
        
                $result[$key] = $this->collПредписанияs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collпроблемныевопросыs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�роблемныевопросыs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Проблемные_вопросыs';
                        break;
                    default:
                        $key = 'проблемныевопросыs';
                }
        
                $result[$key] = $this->collпроблемныевопросыs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collпрограммыs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�рограммыs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Программыs';
                        break;
                    default:
                        $key = 'программыs';
                }
        
                $result[$key] = $this->collпрограммыs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collучасткиработs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�часткиработs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Участки_работs';
                        break;
                    default:
                        $key = 'участкиработs';
                }
        
                $result[$key] = $this->collучасткиработs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Проекты
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ПроектыTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Проекты
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setкодпроекта($value);
                break;
            case 2:
                $this->setпроект($value);
                break;
            case 3:
                $this->setруководитель($value);
                break;
            case 4:
                $this->setзаказчик($value);
                break;
            case 5:
                $this->setподрядчики($value);
                break;
            case 6:
                $this->setпериодвыполненияработ($value);
                break;
            case 7:
                $this->setдеталипроекта($value);
                break;
            case 8:
                $this->setтипстроительства($value);
                break;
            case 9:
                $this->setназваниепапкипроекта($value);
                break;
            case 10:
                $this->setкартинка($value);
                break;
            case 11:
                $this->setкарточкапроекта($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = ПроектыTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setкодпроекта($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setпроект($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setруководитель($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setзаказчик($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setподрядчики($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setпериодвыполненияработ($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setдеталипроекта($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setтипстроительства($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setназваниепапкипроекта($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setкартинка($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setкарточкапроекта($arr[$keys[11]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Проекты The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ПроектыTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ПроектыTableMap::COL_ID)) {
            $criteria->add(ПроектыTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КОД_ПРОЕКТА)) {
            $criteria->add(ПроектыTableMap::COL_КОД_ПРОЕКТА, $this->код_проекта);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ПРОЕКТ)) {
            $criteria->add(ПроектыTableMap::COL_ПРОЕКТ, $this->проект);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_РУКОВОДИТЕЛЬ)) {
            $criteria->add(ПроектыTableMap::COL_РУКОВОДИТЕЛЬ, $this->руководитель);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ЗАКАЗЧИК)) {
            $criteria->add(ПроектыTableMap::COL_ЗАКАЗЧИК, $this->заказчик);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ПОДРЯДЧИКИ)) {
            $criteria->add(ПроектыTableMap::COL_ПОДРЯДЧИКИ, $this->подрядчики);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ПЕРИОД_ВЫПОЛНЕНИЯ_РАБОТ)) {
            $criteria->add(ПроектыTableMap::COL_ПЕРИОД_ВЫПОЛНЕНИЯ_РАБОТ, $this->период_выполнения_работ);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ДЕТАЛИ_ПРОЕКТА)) {
            $criteria->add(ПроектыTableMap::COL_ДЕТАЛИ_ПРОЕКТА, $this->детали_проекта);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ТИП_СТРОИТЕЛЬСТВА)) {
            $criteria->add(ПроектыTableMap::COL_ТИП_СТРОИТЕЛЬСТВА, $this->тип_строительства);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_НАЗВАНИЕ_ПАПКИ_ПРОЕКТА)) {
            $criteria->add(ПроектыTableMap::COL_НАЗВАНИЕ_ПАПКИ_ПРОЕКТА, $this->название_папки_проекта);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КАРТИНКА)) {
            $criteria->add(ПроектыTableMap::COL_КАРТИНКА, $this->картинка);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КАРТОЧКА_ПРОЕКТА)) {
            $criteria->add(ПроектыTableMap::COL_КАРТОЧКА_ПРОЕКТА, $this->карточка_проекта);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildПроектыQuery::create();
        $criteria->add(ПроектыTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }
        
    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Проекты (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setкодпроекта($this->getкодпроекта());
        $copyObj->setпроект($this->getпроект());
        $copyObj->setруководитель($this->getруководитель());
        $copyObj->setзаказчик($this->getзаказчик());
        $copyObj->setподрядчики($this->getподрядчики());
        $copyObj->setпериодвыполненияработ($this->getпериодвыполненияработ());
        $copyObj->setдеталипроекта($this->getдеталипроекта());
        $copyObj->setтипстроительства($this->getтипстроительства());
        $copyObj->setназваниепапкипроекта($this->getназваниепапкипроекта());
        $copyObj->setкартинка($this->getкартинка());
        $copyObj->setкарточкапроекта($this->getкарточкапроекта());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getдатыобновленийдашбордовs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addдатыобновленийдашбордов($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getмтрs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addмтр($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getмобилизацияs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addмобилизация($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getмобилизацияпомесяцамs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addмобилизацияпомесяцам($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getПредписанияs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addПредписания($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getпроблемныевопросыs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addпроблемныевопросы($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getпрограммыs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addпрограммы($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getучасткиработs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addучасткиработ($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Проекты Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('датыобновленийдашбордов' == $relationName) {
            return $this->initдатыобновленийдашбордовs();
        }
        if ('мтр' == $relationName) {
            return $this->initмтрs();
        }
        if ('мобилизация' == $relationName) {
            return $this->initмобилизацияs();
        }
        if ('мобилизацияпомесяцам' == $relationName) {
            return $this->initмобилизацияпомесяцамs();
        }
        if ('Предписания' == $relationName) {
            return $this->initПредписанияs();
        }
        if ('проблемныевопросы' == $relationName) {
            return $this->initпроблемныевопросыs();
        }
        if ('программы' == $relationName) {
            return $this->initпрограммыs();
        }
        if ('участкиработ' == $relationName) {
            return $this->initучасткиработs();
        }
    }

    /**
     * Clears out the collдатыобновленийдашбордовs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addдатыобновленийдашбордовs()
     */
    public function clearдатыобновленийдашбордовs()
    {
        $this->collдатыобновленийдашбордовs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collдатыобновленийдашбордовs collection loaded partially.
     */
    public function resetPartialдатыобновленийдашбордовs($v = true)
    {
        $this->collдатыобновленийдашбордовsPartial = $v;
    }

    /**
     * Initializes the collдатыобновленийдашбордовs collection.
     *
     * By default this just sets the collдатыобновленийдашбордовs collection to an empty array (like clearcollдатыобновленийдашбордовs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initдатыобновленийдашбордовs($overrideExisting = true)
    {
        if (null !== $this->collдатыобновленийдашбордовs && !$overrideExisting) {
            return;
        }

        $collectionClassName = датыобновленийдашбордовTableMap::getTableMap()->getCollectionClassName();

        $this->collдатыобновленийдашбордовs = new $collectionClassName;
        $this->collдатыобновленийдашбордовs->setModel('\датыобновленийдашбордов');
    }

    /**
     * Gets an array of Childдатыобновленийдашбордов objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildПроекты is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|Childдатыобновленийдашбордов[] List of Childдатыобновленийдашбордов objects
     * @throws PropelException
     */
    public function getдатыобновленийдашбордовs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collдатыобновленийдашбордовsPartial && !$this->isNew();
        if (null === $this->collдатыобновленийдашбордовs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collдатыобновленийдашбордовs) {
                // return empty collection
                $this->initдатыобновленийдашбордовs();
            } else {
                $collдатыобновленийдашбордовs = ChildдатыобновленийдашбордовQuery::create(null, $criteria)
                    ->filterByПроекты($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collдатыобновленийдашбордовsPartial && count($collдатыобновленийдашбордовs)) {
                        $this->initдатыобновленийдашбордовs(false);

                        foreach ($collдатыобновленийдашбордовs as $obj) {
                            if (false == $this->collдатыобновленийдашбордовs->contains($obj)) {
                                $this->collдатыобновленийдашбордовs->append($obj);
                            }
                        }

                        $this->collдатыобновленийдашбордовsPartial = true;
                    }

                    return $collдатыобновленийдашбордовs;
                }

                if ($partial && $this->collдатыобновленийдашбордовs) {
                    foreach ($this->collдатыобновленийдашбордовs as $obj) {
                        if ($obj->isNew()) {
                            $collдатыобновленийдашбордовs[] = $obj;
                        }
                    }
                }

                $this->collдатыобновленийдашбордовs = $collдатыобновленийдашбордовs;
                $this->collдатыобновленийдашбордовsPartial = false;
            }
        }

        return $this->collдатыобновленийдашбордовs;
    }

    /**
     * Sets a collection of Childдатыобновленийдашбордов objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�атыобновленийдашбордовs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function setдатыобновленийдашбордовs(Collection $�атыобновленийдашбордовs, ConnectionInterface $con = null)
    {
        /** @var Childдатыобновленийдашбордов[] $�атыобновленийдашбордовsToDelete */
        $�атыобновленийдашбордовsToDelete = $this->getдатыобновленийдашбордовs(new Criteria(), $con)->diff($�атыобновленийдашбордовs);

        
        $this->�атыобновленийдашбордовsScheduledForDeletion = $�атыобновленийдашбордовsToDelete;

        foreach ($�атыобновленийдашбордовsToDelete as $�атыобновленийдашбордовRemoved) {
            $�атыобновленийдашбордовRemoved->setПроекты(null);
        }

        $this->collдатыобновленийдашбордовs = null;
        foreach ($�атыобновленийдашбордовs as $�атыобновленийдашбордов) {
            $this->addдатыобновленийдашбордов($�атыобновленийдашбордов);
        }

        $this->collдатыобновленийдашбордовs = $�атыобновленийдашбордовs;
        $this->collдатыобновленийдашбордовsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related датыобновленийдашбордов objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related датыобновленийдашбордов objects.
     * @throws PropelException
     */
    public function countдатыобновленийдашбордовs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collдатыобновленийдашбордовsPartial && !$this->isNew();
        if (null === $this->collдатыобновленийдашбордовs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collдатыобновленийдашбордовs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getдатыобновленийдашбордовs());
            }

            $query = ChildдатыобновленийдашбордовQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByПроекты($this)
                ->count($con);
        }

        return count($this->collдатыобновленийдашбордовs);
    }

    /**
     * Method called to associate a Childдатыобновленийдашбордов object to this object
     * through the Childдатыобновленийдашбордов foreign key attribute.
     *
     * @param  Childдатыобновленийдашбордов $l Childдатыобновленийдашбордов
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function addдатыобновленийдашбордов(Childдатыобновленийдашбордов $l)
    {
        if ($this->collдатыобновленийдашбордовs === null) {
            $this->initдатыобновленийдашбордовs();
            $this->collдатыобновленийдашбордовsPartial = true;
        }

        if (!$this->collдатыобновленийдашбордовs->contains($l)) {
            $this->doAddдатыобновленийдашбордов($l);

            if ($this->�атыобновленийдашбордовsScheduledForDeletion and $this->�атыобновленийдашбордовsScheduledForDeletion->contains($l)) {
                $this->�атыобновленийдашбордовsScheduledForDeletion->remove($this->�атыобновленийдашбордовsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param Childдатыобновленийдашбордов $�атыобновленийдашбордов The Childдатыобновленийдашбордов object to add.
     */
    protected function doAddдатыобновленийдашбордов(Childдатыобновленийдашбордов $�атыобновленийдашбордов)
    {
        $this->collдатыобновленийдашбордовs[]= $�атыобновленийдашбордов;
        $�атыобновленийдашбордов->setПроекты($this);
    }

    /**
     * @param  Childдатыобновленийдашбордов $�атыобновленийдашбордов The Childдатыобновленийдашбордов object to remove.
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function removeдатыобновленийдашбордов(Childдатыобновленийдашбордов $�атыобновленийдашбордов)
    {
        if ($this->getдатыобновленийдашбордовs()->contains($�атыобновленийдашбордов)) {
            $pos = $this->collдатыобновленийдашбордовs->search($�атыобновленийдашбордов);
            $this->collдатыобновленийдашбордовs->remove($pos);
            if (null === $this->�атыобновленийдашбордовsScheduledForDeletion) {
                $this->�атыобновленийдашбордовsScheduledForDeletion = clone $this->collдатыобновленийдашбордовs;
                $this->�атыобновленийдашбордовsScheduledForDeletion->clear();
            }
            $this->�атыобновленийдашбордовsScheduledForDeletion[]= $�атыобновленийдашбордов;
            $�атыобновленийдашбордов->setПроекты(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related датыобновленийдашбордовs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childдатыобновленийдашбордов[] List of Childдатыобновленийдашбордов objects
     */
    public function getдатыобновленийдашбордовsJoinКалендарь(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildдатыобновленийдашбордовQuery::create(null, $criteria);
        $query->joinWith('Календарь', $joinBehavior);

        return $this->getдатыобновленийдашбордовs($query, $con);
    }

    /**
     * Clears out the collмтрs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addмтрs()
     */
    public function clearмтрs()
    {
        $this->collмтрs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collмтрs collection loaded partially.
     */
    public function resetPartialмтрs($v = true)
    {
        $this->collмтрsPartial = $v;
    }

    /**
     * Initializes the collмтрs collection.
     *
     * By default this just sets the collмтрs collection to an empty array (like clearcollмтрs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initмтрs($overrideExisting = true)
    {
        if (null !== $this->collмтрs && !$overrideExisting) {
            return;
        }

        $collectionClassName = мтрTableMap::getTableMap()->getCollectionClassName();

        $this->collмтрs = new $collectionClassName;
        $this->collмтрs->setModel('\мтр');
    }

    /**
     * Gets an array of Childмтр objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildПроекты is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|Childмтр[] List of Childмтр objects
     * @throws PropelException
     */
    public function getмтрs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collмтрsPartial && !$this->isNew();
        if (null === $this->collмтрs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collмтрs) {
                // return empty collection
                $this->initмтрs();
            } else {
                $collмтрs = ChildмтрQuery::create(null, $criteria)
                    ->filterByПроекты($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collмтрsPartial && count($collмтрs)) {
                        $this->initмтрs(false);

                        foreach ($collмтрs as $obj) {
                            if (false == $this->collмтрs->contains($obj)) {
                                $this->collмтрs->append($obj);
                            }
                        }

                        $this->collмтрsPartial = true;
                    }

                    return $collмтрs;
                }

                if ($partial && $this->collмтрs) {
                    foreach ($this->collмтрs as $obj) {
                        if ($obj->isNew()) {
                            $collмтрs[] = $obj;
                        }
                    }
                }

                $this->collмтрs = $collмтрs;
                $this->collмтрsPartial = false;
            }
        }

        return $this->collмтрs;
    }

    /**
     * Sets a collection of Childмтр objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�трs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function setмтрs(Collection $�трs, ConnectionInterface $con = null)
    {
        /** @var Childмтр[] $�трsToDelete */
        $�трsToDelete = $this->getмтрs(new Criteria(), $con)->diff($�трs);

        
        $this->�трsScheduledForDeletion = $�трsToDelete;

        foreach ($�трsToDelete as $�трRemoved) {
            $�трRemoved->setПроекты(null);
        }

        $this->collмтрs = null;
        foreach ($�трs as $�тр) {
            $this->addмтр($�тр);
        }

        $this->collмтрs = $�трs;
        $this->collмтрsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related мтр objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related мтр objects.
     * @throws PropelException
     */
    public function countмтрs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collмтрsPartial && !$this->isNew();
        if (null === $this->collмтрs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collмтрs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getмтрs());
            }

            $query = ChildмтрQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByПроекты($this)
                ->count($con);
        }

        return count($this->collмтрs);
    }

    /**
     * Method called to associate a Childмтр object to this object
     * through the Childмтр foreign key attribute.
     *
     * @param  Childмтр $l Childмтр
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function addмтр(Childмтр $l)
    {
        if ($this->collмтрs === null) {
            $this->initмтрs();
            $this->collмтрsPartial = true;
        }

        if (!$this->collмтрs->contains($l)) {
            $this->doAddмтр($l);

            if ($this->�трsScheduledForDeletion and $this->�трsScheduledForDeletion->contains($l)) {
                $this->�трsScheduledForDeletion->remove($this->�трsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param Childмтр $�тр The Childмтр object to add.
     */
    protected function doAddмтр(Childмтр $�тр)
    {
        $this->collмтрs[]= $�тр;
        $�тр->setПроекты($this);
    }

    /**
     * @param  Childмтр $�тр The Childмтр object to remove.
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function removeмтр(Childмтр $�тр)
    {
        if ($this->getмтрs()->contains($�тр)) {
            $pos = $this->collмтрs->search($�тр);
            $this->collмтрs->remove($pos);
            if (null === $this->�трsScheduledForDeletion) {
                $this->�трsScheduledForDeletion = clone $this->collмтрs;
                $this->�трsScheduledForDeletion->clear();
            }
            $this->�трsScheduledForDeletion[]= $�тр;
            $�тр->setПроекты(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мтрs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмтр[] List of Childмтр objects
     */
    public function getмтрsJoinКалендарь(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмтрQuery::create(null, $criteria);
        $query->joinWith('Календарь', $joinBehavior);

        return $this->getмтрs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мтрs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмтр[] List of Childмтр objects
     */
    public function getмтрsJoinподрядчикимтр(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмтрQuery::create(null, $criteria);
        $query->joinWith('подрядчикимтр', $joinBehavior);

        return $this->getмтрs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мтрs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмтр[] List of Childмтр objects
     */
    public function getмтрsJoinстатуссостояниятехники(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмтрQuery::create(null, $criteria);
        $query->joinWith('статуссостояниятехники', $joinBehavior);

        return $this->getмтрs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мтрs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмтр[] List of Childмтр objects
     */
    public function getмтрsJoinтипытехникимтр(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмтрQuery::create(null, $criteria);
        $query->joinWith('типытехникимтр', $joinBehavior);

        return $this->getмтрs($query, $con);
    }

    /**
     * Clears out the collмобилизацияs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addмобилизацияs()
     */
    public function clearмобилизацияs()
    {
        $this->collмобилизацияs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collмобилизацияs collection loaded partially.
     */
    public function resetPartialмобилизацияs($v = true)
    {
        $this->collмобилизацияsPartial = $v;
    }

    /**
     * Initializes the collмобилизацияs collection.
     *
     * By default this just sets the collмобилизацияs collection to an empty array (like clearcollмобилизацияs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initмобилизацияs($overrideExisting = true)
    {
        if (null !== $this->collмобилизацияs && !$overrideExisting) {
            return;
        }

        $collectionClassName = мобилизацияTableMap::getTableMap()->getCollectionClassName();

        $this->collмобилизацияs = new $collectionClassName;
        $this->collмобилизацияs->setModel('\мобилизация');
    }

    /**
     * Gets an array of Childмобилизация objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildПроекты is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|Childмобилизация[] List of Childмобилизация objects
     * @throws PropelException
     */
    public function getмобилизацияs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collмобилизацияsPartial && !$this->isNew();
        if (null === $this->collмобилизацияs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collмобилизацияs) {
                // return empty collection
                $this->initмобилизацияs();
            } else {
                $collмобилизацияs = ChildмобилизацияQuery::create(null, $criteria)
                    ->filterByПроекты($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collмобилизацияsPartial && count($collмобилизацияs)) {
                        $this->initмобилизацияs(false);

                        foreach ($collмобилизацияs as $obj) {
                            if (false == $this->collмобилизацияs->contains($obj)) {
                                $this->collмобилизацияs->append($obj);
                            }
                        }

                        $this->collмобилизацияsPartial = true;
                    }

                    return $collмобилизацияs;
                }

                if ($partial && $this->collмобилизацияs) {
                    foreach ($this->collмобилизацияs as $obj) {
                        if ($obj->isNew()) {
                            $collмобилизацияs[] = $obj;
                        }
                    }
                }

                $this->collмобилизацияs = $collмобилизацияs;
                $this->collмобилизацияsPartial = false;
            }
        }

        return $this->collмобилизацияs;
    }

    /**
     * Sets a collection of Childмобилизация objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�обилизацияs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function setмобилизацияs(Collection $�обилизацияs, ConnectionInterface $con = null)
    {
        /** @var Childмобилизация[] $�обилизацияsToDelete */
        $�обилизацияsToDelete = $this->getмобилизацияs(new Criteria(), $con)->diff($�обилизацияs);

        
        $this->�обилизацияsScheduledForDeletion = $�обилизацияsToDelete;

        foreach ($�обилизацияsToDelete as $�обилизацияRemoved) {
            $�обилизацияRemoved->setПроекты(null);
        }

        $this->collмобилизацияs = null;
        foreach ($�обилизацияs as $�обилизация) {
            $this->addмобилизация($�обилизация);
        }

        $this->collмобилизацияs = $�обилизацияs;
        $this->collмобилизацияsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related мобилизация objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related мобилизация objects.
     * @throws PropelException
     */
    public function countмобилизацияs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collмобилизацияsPartial && !$this->isNew();
        if (null === $this->collмобилизацияs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collмобилизацияs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getмобилизацияs());
            }

            $query = ChildмобилизацияQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByПроекты($this)
                ->count($con);
        }

        return count($this->collмобилизацияs);
    }

    /**
     * Method called to associate a Childмобилизация object to this object
     * through the Childмобилизация foreign key attribute.
     *
     * @param  Childмобилизация $l Childмобилизация
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function addмобилизация(Childмобилизация $l)
    {
        if ($this->collмобилизацияs === null) {
            $this->initмобилизацияs();
            $this->collмобилизацияsPartial = true;
        }

        if (!$this->collмобилизацияs->contains($l)) {
            $this->doAddмобилизация($l);

            if ($this->�обилизацияsScheduledForDeletion and $this->�обилизацияsScheduledForDeletion->contains($l)) {
                $this->�обилизацияsScheduledForDeletion->remove($this->�обилизацияsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param Childмобилизация $�обилизация The Childмобилизация object to add.
     */
    protected function doAddмобилизация(Childмобилизация $�обилизация)
    {
        $this->collмобилизацияs[]= $�обилизация;
        $�обилизация->setПроекты($this);
    }

    /**
     * @param  Childмобилизация $�обилизация The Childмобилизация object to remove.
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function removeмобилизация(Childмобилизация $�обилизация)
    {
        if ($this->getмобилизацияs()->contains($�обилизация)) {
            $pos = $this->collмобилизацияs->search($�обилизация);
            $this->collмобилизацияs->remove($pos);
            if (null === $this->�обилизацияsScheduledForDeletion) {
                $this->�обилизацияsScheduledForDeletion = clone $this->collмобилизацияs;
                $this->�обилизацияsScheduledForDeletion->clear();
            }
            $this->�обилизацияsScheduledForDeletion[]= clone $�обилизация;
            $�обилизация->setПроекты(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мобилизацияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизация[] List of Childмобилизация objects
     */
    public function getмобилизацияsJoinКалендарь(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияQuery::create(null, $criteria);
        $query->joinWith('Календарь', $joinBehavior);

        return $this->getмобилизацияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мобилизацияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизация[] List of Childмобилизация objects
     */
    public function getмобилизацияsJoinтипытехникимобилизация(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияQuery::create(null, $criteria);
        $query->joinWith('типытехникимобилизация', $joinBehavior);

        return $this->getмобилизацияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мобилизацияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизация[] List of Childмобилизация objects
     */
    public function getмобилизацияsJoinучасткиработмобилизация(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияQuery::create(null, $criteria);
        $query->joinWith('участкиработмобилизация', $joinBehavior);

        return $this->getмобилизацияs($query, $con);
    }

    /**
     * Clears out the collмобилизацияпомесяцамs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addмобилизацияпомесяцамs()
     */
    public function clearмобилизацияпомесяцамs()
    {
        $this->collмобилизацияпомесяцамs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collмобилизацияпомесяцамs collection loaded partially.
     */
    public function resetPartialмобилизацияпомесяцамs($v = true)
    {
        $this->collмобилизацияпомесяцамsPartial = $v;
    }

    /**
     * Initializes the collмобилизацияпомесяцамs collection.
     *
     * By default this just sets the collмобилизацияпомесяцамs collection to an empty array (like clearcollмобилизацияпомесяцамs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initмобилизацияпомесяцамs($overrideExisting = true)
    {
        if (null !== $this->collмобилизацияпомесяцамs && !$overrideExisting) {
            return;
        }

        $collectionClassName = мобилизацияпомесяцамTableMap::getTableMap()->getCollectionClassName();

        $this->collмобилизацияпомесяцамs = new $collectionClassName;
        $this->collмобилизацияпомесяцамs->setModel('\мобилизацияпомесяцам');
    }

    /**
     * Gets an array of Childмобилизацияпомесяцам objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildПроекты is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|Childмобилизацияпомесяцам[] List of Childмобилизацияпомесяцам objects
     * @throws PropelException
     */
    public function getмобилизацияпомесяцамs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collмобилизацияпомесяцамsPartial && !$this->isNew();
        if (null === $this->collмобилизацияпомесяцамs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collмобилизацияпомесяцамs) {
                // return empty collection
                $this->initмобилизацияпомесяцамs();
            } else {
                $collмобилизацияпомесяцамs = ChildмобилизацияпомесяцамQuery::create(null, $criteria)
                    ->filterByПроекты($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collмобилизацияпомесяцамsPartial && count($collмобилизацияпомесяцамs)) {
                        $this->initмобилизацияпомесяцамs(false);

                        foreach ($collмобилизацияпомесяцамs as $obj) {
                            if (false == $this->collмобилизацияпомесяцамs->contains($obj)) {
                                $this->collмобилизацияпомесяцамs->append($obj);
                            }
                        }

                        $this->collмобилизацияпомесяцамsPartial = true;
                    }

                    return $collмобилизацияпомесяцамs;
                }

                if ($partial && $this->collмобилизацияпомесяцамs) {
                    foreach ($this->collмобилизацияпомесяцамs as $obj) {
                        if ($obj->isNew()) {
                            $collмобилизацияпомесяцамs[] = $obj;
                        }
                    }
                }

                $this->collмобилизацияпомесяцамs = $collмобилизацияпомесяцамs;
                $this->collмобилизацияпомесяцамsPartial = false;
            }
        }

        return $this->collмобилизацияпомесяцамs;
    }

    /**
     * Sets a collection of Childмобилизацияпомесяцам objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�обилизацияпомесяцамs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function setмобилизацияпомесяцамs(Collection $�обилизацияпомесяцамs, ConnectionInterface $con = null)
    {
        /** @var Childмобилизацияпомесяцам[] $�обилизацияпомесяцамsToDelete */
        $�обилизацияпомесяцамsToDelete = $this->getмобилизацияпомесяцамs(new Criteria(), $con)->diff($�обилизацияпомесяцамs);

        
        $this->�обилизацияпомесяцамsScheduledForDeletion = $�обилизацияпомесяцамsToDelete;

        foreach ($�обилизацияпомесяцамsToDelete as $�обилизацияпомесяцамRemoved) {
            $�обилизацияпомесяцамRemoved->setПроекты(null);
        }

        $this->collмобилизацияпомесяцамs = null;
        foreach ($�обилизацияпомесяцамs as $�обилизацияпомесяцам) {
            $this->addмобилизацияпомесяцам($�обилизацияпомесяцам);
        }

        $this->collмобилизацияпомесяцамs = $�обилизацияпомесяцамs;
        $this->collмобилизацияпомесяцамsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related мобилизацияпомесяцам objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related мобилизацияпомесяцам objects.
     * @throws PropelException
     */
    public function countмобилизацияпомесяцамs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collмобилизацияпомесяцамsPartial && !$this->isNew();
        if (null === $this->collмобилизацияпомесяцамs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collмобилизацияпомесяцамs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getмобилизацияпомесяцамs());
            }

            $query = ChildмобилизацияпомесяцамQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByПроекты($this)
                ->count($con);
        }

        return count($this->collмобилизацияпомесяцамs);
    }

    /**
     * Method called to associate a Childмобилизацияпомесяцам object to this object
     * through the Childмобилизацияпомесяцам foreign key attribute.
     *
     * @param  Childмобилизацияпомесяцам $l Childмобилизацияпомесяцам
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function addмобилизацияпомесяцам(Childмобилизацияпомесяцам $l)
    {
        if ($this->collмобилизацияпомесяцамs === null) {
            $this->initмобилизацияпомесяцамs();
            $this->collмобилизацияпомесяцамsPartial = true;
        }

        if (!$this->collмобилизацияпомесяцамs->contains($l)) {
            $this->doAddмобилизацияпомесяцам($l);

            if ($this->�обилизацияпомесяцамsScheduledForDeletion and $this->�обилизацияпомесяцамsScheduledForDeletion->contains($l)) {
                $this->�обилизацияпомесяцамsScheduledForDeletion->remove($this->�обилизацияпомесяцамsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param Childмобилизацияпомесяцам $�обилизацияпомесяцам The Childмобилизацияпомесяцам object to add.
     */
    protected function doAddмобилизацияпомесяцам(Childмобилизацияпомесяцам $�обилизацияпомесяцам)
    {
        $this->collмобилизацияпомесяцамs[]= $�обилизацияпомесяцам;
        $�обилизацияпомесяцам->setПроекты($this);
    }

    /**
     * @param  Childмобилизацияпомесяцам $�обилизацияпомесяцам The Childмобилизацияпомесяцам object to remove.
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function removeмобилизацияпомесяцам(Childмобилизацияпомесяцам $�обилизацияпомесяцам)
    {
        if ($this->getмобилизацияпомесяцамs()->contains($�обилизацияпомесяцам)) {
            $pos = $this->collмобилизацияпомесяцамs->search($�обилизацияпомесяцам);
            $this->collмобилизацияпомесяцамs->remove($pos);
            if (null === $this->�обилизацияпомесяцамsScheduledForDeletion) {
                $this->�обилизацияпомесяцамsScheduledForDeletion = clone $this->collмобилизацияпомесяцамs;
                $this->�обилизацияпомесяцамsScheduledForDeletion->clear();
            }
            $this->�обилизацияпомесяцамsScheduledForDeletion[]= clone $�обилизацияпомесяцам;
            $�обилизацияпомесяцам->setПроекты(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизацияпомесяцам[] List of Childмобилизацияпомесяцам objects
     */
    public function getмобилизацияпомесяцамsJoinучасткиработмобилизация(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияпомесяцамQuery::create(null, $criteria);
        $query->joinWith('участкиработмобилизация', $joinBehavior);

        return $this->getмобилизацияпомесяцамs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизацияпомесяцам[] List of Childмобилизацияпомесяцам objects
     */
    public function getмобилизацияпомесяцамsJoinКалендарь(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияпомесяцамQuery::create(null, $criteria);
        $query->joinWith('Календарь', $joinBehavior);

        return $this->getмобилизацияпомесяцамs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизацияпомесяцам[] List of Childмобилизацияпомесяцам objects
     */
    public function getмобилизацияпомесяцамsJoinтипытехникимобилизация(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияпомесяцамQuery::create(null, $criteria);
        $query->joinWith('типытехникимобилизация', $joinBehavior);

        return $this->getмобилизацияпомесяцамs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизацияпомесяцам[] List of Childмобилизацияпомесяцам objects
     */
    public function getмобилизацияпомесяцамsJoinгода(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияпомесяцамQuery::create(null, $criteria);
        $query->joinWith('года', $joinBehavior);

        return $this->getмобилизацияпомесяцамs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизацияпомесяцам[] List of Childмобилизацияпомесяцам objects
     */
    public function getмобилизацияпомесяцамsJoinмесяца(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияпомесяцамQuery::create(null, $criteria);
        $query->joinWith('месяца', $joinBehavior);

        return $this->getмобилизацияпомесяцамs($query, $con);
    }

    /**
     * Clears out the collПредписанияs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addПредписанияs()
     */
    public function clearПредписанияs()
    {
        $this->collПредписанияs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collПредписанияs collection loaded partially.
     */
    public function resetPartialПредписанияs($v = true)
    {
        $this->collПредписанияsPartial = $v;
    }

    /**
     * Initializes the collПредписанияs collection.
     *
     * By default this just sets the collПредписанияs collection to an empty array (like clearcollПредписанияs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initПредписанияs($overrideExisting = true)
    {
        if (null !== $this->collПредписанияs && !$overrideExisting) {
            return;
        }

        $collectionClassName = ПредписанияTableMap::getTableMap()->getCollectionClassName();

        $this->collПредписанияs = new $collectionClassName;
        $this->collПредписанияs->setModel('\Предписания');
    }

    /**
     * Gets an array of ChildПредписания objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildПроекты is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     * @throws PropelException
     */
    public function getПредписанияs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collПредписанияsPartial && !$this->isNew();
        if (null === $this->collПредписанияs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collПредписанияs) {
                // return empty collection
                $this->initПредписанияs();
            } else {
                $collПредписанияs = ChildПредписанияQuery::create(null, $criteria)
                    ->filterByПроекты($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collПредписанияsPartial && count($collПредписанияs)) {
                        $this->initПредписанияs(false);

                        foreach ($collПредписанияs as $obj) {
                            if (false == $this->collПредписанияs->contains($obj)) {
                                $this->collПредписанияs->append($obj);
                            }
                        }

                        $this->collПредписанияsPartial = true;
                    }

                    return $collПредписанияs;
                }

                if ($partial && $this->collПредписанияs) {
                    foreach ($this->collПредписанияs as $obj) {
                        if ($obj->isNew()) {
                            $collПредписанияs[] = $obj;
                        }
                    }
                }

                $this->collПредписанияs = $collПредписанияs;
                $this->collПредписанияsPartial = false;
            }
        }

        return $this->collПредписанияs;
    }

    /**
     * Sets a collection of ChildПредписания objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�редписанияs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function setПредписанияs(Collection $�редписанияs, ConnectionInterface $con = null)
    {
        /** @var ChildПредписания[] $�редписанияsToDelete */
        $�редписанияsToDelete = $this->getПредписанияs(new Criteria(), $con)->diff($�редписанияs);

        
        $this->�редписанияsScheduledForDeletion = $�редписанияsToDelete;

        foreach ($�редписанияsToDelete as $�редписанияRemoved) {
            $�редписанияRemoved->setПроекты(null);
        }

        $this->collПредписанияs = null;
        foreach ($�редписанияs as $�редписания) {
            $this->addПредписания($�редписания);
        }

        $this->collПредписанияs = $�редписанияs;
        $this->collПредписанияsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Предписания objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Предписания objects.
     * @throws PropelException
     */
    public function countПредписанияs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collПредписанияsPartial && !$this->isNew();
        if (null === $this->collПредписанияs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collПредписанияs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getПредписанияs());
            }

            $query = ChildПредписанияQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByПроекты($this)
                ->count($con);
        }

        return count($this->collПредписанияs);
    }

    /**
     * Method called to associate a ChildПредписания object to this object
     * through the ChildПредписания foreign key attribute.
     *
     * @param  ChildПредписания $l ChildПредписания
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function addПредписания(ChildПредписания $l)
    {
        if ($this->collПредписанияs === null) {
            $this->initПредписанияs();
            $this->collПредписанияsPartial = true;
        }

        if (!$this->collПредписанияs->contains($l)) {
            $this->doAddПредписания($l);

            if ($this->�редписанияsScheduledForDeletion and $this->�редписанияsScheduledForDeletion->contains($l)) {
                $this->�редписанияsScheduledForDeletion->remove($this->�редписанияsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildПредписания $�редписания The ChildПредписания object to add.
     */
    protected function doAddПредписания(ChildПредписания $�редписания)
    {
        $this->collПредписанияs[]= $�редписания;
        $�редписания->setПроекты($this);
    }

    /**
     * @param  ChildПредписания $�редписания The ChildПредписания object to remove.
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function removeПредписания(ChildПредписания $�редписания)
    {
        if ($this->getПредписанияs()->contains($�редписания)) {
            $pos = $this->collПредписанияs->search($�редписания);
            $this->collПредписанияs->remove($pos);
            if (null === $this->�редписанияsScheduledForDeletion) {
                $this->�редписанияsScheduledForDeletion = clone $this->collПредписанияs;
                $this->�редписанияsScheduledForDeletion->clear();
            }
            $this->�редписанияsScheduledForDeletion[]= clone $�редписания;
            $�редписания->setПроекты(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related Предписанияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsJoinКалендарьRelatedByдатавыдачи(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('КалендарьRelatedByдатавыдачи', $joinBehavior);

        return $this->getПредписанияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related Предписанияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsJoinКонтролирующиеОрганы(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('КонтролирующиеОрганы', $joinBehavior);

        return $this->getПредписанияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related Предписанияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsJoinКалендарьRelatedByплановаядатаустранения(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('КалендарьRelatedByплановаядатаустранения', $joinBehavior);

        return $this->getПредписанияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related Предписанияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsJoinПодрядчикиПредписания(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('ПодрядчикиПредписания', $joinBehavior);

        return $this->getПредписанияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related Предписанияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsJoinСтатусыЗаявкиЗавершение(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('СтатусыЗаявкиЗавершение', $joinBehavior);

        return $this->getПредписанияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related Предписанияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsJoinСтатусыЗаявкиПросрочка(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('СтатусыЗаявкиПросрочка', $joinBehavior);

        return $this->getПредписанияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related Предписанияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsJoinТипыЗамечаний(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('ТипыЗамечаний', $joinBehavior);

        return $this->getПредписанияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Проекты is new, it will return
     * an empty collection; or if this Проекты has previously
     * been saved, it will retrieve related Предписанияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Проекты.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsJoinКалендарьRelatedByфактическаядатаустранения(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('КалендарьRelatedByфактическаядатаустранения', $joinBehavior);

        return $this->getПредписанияs($query, $con);
    }

    /**
     * Clears out the collпроблемныевопросыs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addпроблемныевопросыs()
     */
    public function clearпроблемныевопросыs()
    {
        $this->collпроблемныевопросыs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collпроблемныевопросыs collection loaded partially.
     */
    public function resetPartialпроблемныевопросыs($v = true)
    {
        $this->collпроблемныевопросыsPartial = $v;
    }

    /**
     * Initializes the collпроблемныевопросыs collection.
     *
     * By default this just sets the collпроблемныевопросыs collection to an empty array (like clearcollпроблемныевопросыs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initпроблемныевопросыs($overrideExisting = true)
    {
        if (null !== $this->collпроблемныевопросыs && !$overrideExisting) {
            return;
        }

        $collectionClassName = проблемныевопросыTableMap::getTableMap()->getCollectionClassName();

        $this->collпроблемныевопросыs = new $collectionClassName;
        $this->collпроблемныевопросыs->setModel('\проблемныевопросы');
    }

    /**
     * Gets an array of Childпроблемныевопросы objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildПроекты is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|Childпроблемныевопросы[] List of Childпроблемныевопросы objects
     * @throws PropelException
     */
    public function getпроблемныевопросыs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collпроблемныевопросыsPartial && !$this->isNew();
        if (null === $this->collпроблемныевопросыs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collпроблемныевопросыs) {
                // return empty collection
                $this->initпроблемныевопросыs();
            } else {
                $collпроблемныевопросыs = ChildпроблемныевопросыQuery::create(null, $criteria)
                    ->filterByПроекты($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collпроблемныевопросыsPartial && count($collпроблемныевопросыs)) {
                        $this->initпроблемныевопросыs(false);

                        foreach ($collпроблемныевопросыs as $obj) {
                            if (false == $this->collпроблемныевопросыs->contains($obj)) {
                                $this->collпроблемныевопросыs->append($obj);
                            }
                        }

                        $this->collпроблемныевопросыsPartial = true;
                    }

                    return $collпроблемныевопросыs;
                }

                if ($partial && $this->collпроблемныевопросыs) {
                    foreach ($this->collпроблемныевопросыs as $obj) {
                        if ($obj->isNew()) {
                            $collпроблемныевопросыs[] = $obj;
                        }
                    }
                }

                $this->collпроблемныевопросыs = $collпроблемныевопросыs;
                $this->collпроблемныевопросыsPartial = false;
            }
        }

        return $this->collпроблемныевопросыs;
    }

    /**
     * Sets a collection of Childпроблемныевопросы objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�роблемныевопросыs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function setпроблемныевопросыs(Collection $�роблемныевопросыs, ConnectionInterface $con = null)
    {
        /** @var Childпроблемныевопросы[] $�роблемныевопросыsToDelete */
        $�роблемныевопросыsToDelete = $this->getпроблемныевопросыs(new Criteria(), $con)->diff($�роблемныевопросыs);

        
        $this->�роблемныевопросыsScheduledForDeletion = $�роблемныевопросыsToDelete;

        foreach ($�роблемныевопросыsToDelete as $�роблемныевопросыRemoved) {
            $�роблемныевопросыRemoved->setПроекты(null);
        }

        $this->collпроблемныевопросыs = null;
        foreach ($�роблемныевопросыs as $�роблемныевопросы) {
            $this->addпроблемныевопросы($�роблемныевопросы);
        }

        $this->collпроблемныевопросыs = $�роблемныевопросыs;
        $this->collпроблемныевопросыsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related проблемныевопросы objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related проблемныевопросы objects.
     * @throws PropelException
     */
    public function countпроблемныевопросыs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collпроблемныевопросыsPartial && !$this->isNew();
        if (null === $this->collпроблемныевопросыs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collпроблемныевопросыs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getпроблемныевопросыs());
            }

            $query = ChildпроблемныевопросыQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByПроекты($this)
                ->count($con);
        }

        return count($this->collпроблемныевопросыs);
    }

    /**
     * Method called to associate a Childпроблемныевопросы object to this object
     * through the Childпроблемныевопросы foreign key attribute.
     *
     * @param  Childпроблемныевопросы $l Childпроблемныевопросы
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function addпроблемныевопросы(Childпроблемныевопросы $l)
    {
        if ($this->collпроблемныевопросыs === null) {
            $this->initпроблемныевопросыs();
            $this->collпроблемныевопросыsPartial = true;
        }

        if (!$this->collпроблемныевопросыs->contains($l)) {
            $this->doAddпроблемныевопросы($l);

            if ($this->�роблемныевопросыsScheduledForDeletion and $this->�роблемныевопросыsScheduledForDeletion->contains($l)) {
                $this->�роблемныевопросыsScheduledForDeletion->remove($this->�роблемныевопросыsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param Childпроблемныевопросы $�роблемныевопросы The Childпроблемныевопросы object to add.
     */
    protected function doAddпроблемныевопросы(Childпроблемныевопросы $�роблемныевопросы)
    {
        $this->collпроблемныевопросыs[]= $�роблемныевопросы;
        $�роблемныевопросы->setПроекты($this);
    }

    /**
     * @param  Childпроблемныевопросы $�роблемныевопросы The Childпроблемныевопросы object to remove.
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function removeпроблемныевопросы(Childпроблемныевопросы $�роблемныевопросы)
    {
        if ($this->getпроблемныевопросыs()->contains($�роблемныевопросы)) {
            $pos = $this->collпроблемныевопросыs->search($�роблемныевопросы);
            $this->collпроблемныевопросыs->remove($pos);
            if (null === $this->�роблемныевопросыsScheduledForDeletion) {
                $this->�роблемныевопросыsScheduledForDeletion = clone $this->collпроблемныевопросыs;
                $this->�роблемныевопросыsScheduledForDeletion->clear();
            }
            $this->�роблемныевопросыsScheduledForDeletion[]= $�роблемныевопросы;
            $�роблемныевопросы->setПроекты(null);
        }

        return $this;
    }

    /**
     * Clears out the collпрограммыs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addпрограммыs()
     */
    public function clearпрограммыs()
    {
        $this->collпрограммыs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collпрограммыs collection loaded partially.
     */
    public function resetPartialпрограммыs($v = true)
    {
        $this->collпрограммыsPartial = $v;
    }

    /**
     * Initializes the collпрограммыs collection.
     *
     * By default this just sets the collпрограммыs collection to an empty array (like clearcollпрограммыs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initпрограммыs($overrideExisting = true)
    {
        if (null !== $this->collпрограммыs && !$overrideExisting) {
            return;
        }

        $collectionClassName = программыTableMap::getTableMap()->getCollectionClassName();

        $this->collпрограммыs = new $collectionClassName;
        $this->collпрограммыs->setModel('\программы');
    }

    /**
     * Gets an array of Childпрограммы objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildПроекты is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|Childпрограммы[] List of Childпрограммы objects
     * @throws PropelException
     */
    public function getпрограммыs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collпрограммыsPartial && !$this->isNew();
        if (null === $this->collпрограммыs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collпрограммыs) {
                // return empty collection
                $this->initпрограммыs();
            } else {
                $collпрограммыs = ChildпрограммыQuery::create(null, $criteria)
                    ->filterByПроекты($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collпрограммыsPartial && count($collпрограммыs)) {
                        $this->initпрограммыs(false);

                        foreach ($collпрограммыs as $obj) {
                            if (false == $this->collпрограммыs->contains($obj)) {
                                $this->collпрограммыs->append($obj);
                            }
                        }

                        $this->collпрограммыsPartial = true;
                    }

                    return $collпрограммыs;
                }

                if ($partial && $this->collпрограммыs) {
                    foreach ($this->collпрограммыs as $obj) {
                        if ($obj->isNew()) {
                            $collпрограммыs[] = $obj;
                        }
                    }
                }

                $this->collпрограммыs = $collпрограммыs;
                $this->collпрограммыsPartial = false;
            }
        }

        return $this->collпрограммыs;
    }

    /**
     * Sets a collection of Childпрограммы objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�рограммыs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function setпрограммыs(Collection $�рограммыs, ConnectionInterface $con = null)
    {
        /** @var Childпрограммы[] $�рограммыsToDelete */
        $�рограммыsToDelete = $this->getпрограммыs(new Criteria(), $con)->diff($�рограммыs);

        
        $this->�рограммыsScheduledForDeletion = $�рограммыsToDelete;

        foreach ($�рограммыsToDelete as $�рограммыRemoved) {
            $�рограммыRemoved->setПроекты(null);
        }

        $this->collпрограммыs = null;
        foreach ($�рограммыs as $�рограммы) {
            $this->addпрограммы($�рограммы);
        }

        $this->collпрограммыs = $�рограммыs;
        $this->collпрограммыsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related программы objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related программы objects.
     * @throws PropelException
     */
    public function countпрограммыs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collпрограммыsPartial && !$this->isNew();
        if (null === $this->collпрограммыs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collпрограммыs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getпрограммыs());
            }

            $query = ChildпрограммыQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByПроекты($this)
                ->count($con);
        }

        return count($this->collпрограммыs);
    }

    /**
     * Method called to associate a Childпрограммы object to this object
     * through the Childпрограммы foreign key attribute.
     *
     * @param  Childпрограммы $l Childпрограммы
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function addпрограммы(Childпрограммы $l)
    {
        if ($this->collпрограммыs === null) {
            $this->initпрограммыs();
            $this->collпрограммыsPartial = true;
        }

        if (!$this->collпрограммыs->contains($l)) {
            $this->doAddпрограммы($l);

            if ($this->�рограммыsScheduledForDeletion and $this->�рограммыsScheduledForDeletion->contains($l)) {
                $this->�рограммыsScheduledForDeletion->remove($this->�рограммыsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param Childпрограммы $�рограммы The Childпрограммы object to add.
     */
    protected function doAddпрограммы(Childпрограммы $�рограммы)
    {
        $this->collпрограммыs[]= $�рограммы;
        $�рограммы->setПроекты($this);
    }

    /**
     * @param  Childпрограммы $�рограммы The Childпрограммы object to remove.
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function removeпрограммы(Childпрограммы $�рограммы)
    {
        if ($this->getпрограммыs()->contains($�рограммы)) {
            $pos = $this->collпрограммыs->search($�рограммы);
            $this->collпрограммыs->remove($pos);
            if (null === $this->�рограммыsScheduledForDeletion) {
                $this->�рограммыsScheduledForDeletion = clone $this->collпрограммыs;
                $this->�рограммыsScheduledForDeletion->clear();
            }
            $this->�рограммыsScheduledForDeletion[]= clone $�рограммы;
            $�рограммы->setПроекты(null);
        }

        return $this;
    }

    /**
     * Clears out the collучасткиработs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addучасткиработs()
     */
    public function clearучасткиработs()
    {
        $this->collучасткиработs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collучасткиработs collection loaded partially.
     */
    public function resetPartialучасткиработs($v = true)
    {
        $this->collучасткиработsPartial = $v;
    }

    /**
     * Initializes the collучасткиработs collection.
     *
     * By default this just sets the collучасткиработs collection to an empty array (like clearcollучасткиработs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initучасткиработs($overrideExisting = true)
    {
        if (null !== $this->collучасткиработs && !$overrideExisting) {
            return;
        }

        $collectionClassName = участкиработTableMap::getTableMap()->getCollectionClassName();

        $this->collучасткиработs = new $collectionClassName;
        $this->collучасткиработs->setModel('\участкиработ');
    }

    /**
     * Gets an array of Childучасткиработ objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildПроекты is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|Childучасткиработ[] List of Childучасткиработ objects
     * @throws PropelException
     */
    public function getучасткиработs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collучасткиработsPartial && !$this->isNew();
        if (null === $this->collучасткиработs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collучасткиработs) {
                // return empty collection
                $this->initучасткиработs();
            } else {
                $collучасткиработs = ChildучасткиработQuery::create(null, $criteria)
                    ->filterByПроекты($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collучасткиработsPartial && count($collучасткиработs)) {
                        $this->initучасткиработs(false);

                        foreach ($collучасткиработs as $obj) {
                            if (false == $this->collучасткиработs->contains($obj)) {
                                $this->collучасткиработs->append($obj);
                            }
                        }

                        $this->collучасткиработsPartial = true;
                    }

                    return $collучасткиработs;
                }

                if ($partial && $this->collучасткиработs) {
                    foreach ($this->collучасткиработs as $obj) {
                        if ($obj->isNew()) {
                            $collучасткиработs[] = $obj;
                        }
                    }
                }

                $this->collучасткиработs = $collучасткиработs;
                $this->collучасткиработsPartial = false;
            }
        }

        return $this->collучасткиработs;
    }

    /**
     * Sets a collection of Childучасткиработ objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�часткиработs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function setучасткиработs(Collection $�часткиработs, ConnectionInterface $con = null)
    {
        /** @var Childучасткиработ[] $�часткиработsToDelete */
        $�часткиработsToDelete = $this->getучасткиработs(new Criteria(), $con)->diff($�часткиработs);

        
        $this->�часткиработsScheduledForDeletion = $�часткиработsToDelete;

        foreach ($�часткиработsToDelete as $�часткиработRemoved) {
            $�часткиработRemoved->setПроекты(null);
        }

        $this->collучасткиработs = null;
        foreach ($�часткиработs as $�часткиработ) {
            $this->addучасткиработ($�часткиработ);
        }

        $this->collучасткиработs = $�часткиработs;
        $this->collучасткиработsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related участкиработ objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related участкиработ objects.
     * @throws PropelException
     */
    public function countучасткиработs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collучасткиработsPartial && !$this->isNew();
        if (null === $this->collучасткиработs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collучасткиработs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getучасткиработs());
            }

            $query = ChildучасткиработQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByПроекты($this)
                ->count($con);
        }

        return count($this->collучасткиработs);
    }

    /**
     * Method called to associate a Childучасткиработ object to this object
     * through the Childучасткиработ foreign key attribute.
     *
     * @param  Childучасткиработ $l Childучасткиработ
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function addучасткиработ(Childучасткиработ $l)
    {
        if ($this->collучасткиработs === null) {
            $this->initучасткиработs();
            $this->collучасткиработsPartial = true;
        }

        if (!$this->collучасткиработs->contains($l)) {
            $this->doAddучасткиработ($l);

            if ($this->�часткиработsScheduledForDeletion and $this->�часткиработsScheduledForDeletion->contains($l)) {
                $this->�часткиработsScheduledForDeletion->remove($this->�часткиработsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param Childучасткиработ $�часткиработ The Childучасткиработ object to add.
     */
    protected function doAddучасткиработ(Childучасткиработ $�часткиработ)
    {
        $this->collучасткиработs[]= $�часткиработ;
        $�часткиработ->setПроекты($this);
    }

    /**
     * @param  Childучасткиработ $�часткиработ The Childучасткиработ object to remove.
     * @return $this|ChildПроекты The current object (for fluent API support)
     */
    public function removeучасткиработ(Childучасткиработ $�часткиработ)
    {
        if ($this->getучасткиработs()->contains($�часткиработ)) {
            $pos = $this->collучасткиработs->search($�часткиработ);
            $this->collучасткиработs->remove($pos);
            if (null === $this->�часткиработsScheduledForDeletion) {
                $this->�часткиработsScheduledForDeletion = clone $this->collучасткиработs;
                $this->�часткиработsScheduledForDeletion->clear();
            }
            $this->�часткиработsScheduledForDeletion[]= clone $�часткиработ;
            $�часткиработ->setПроекты(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->код_проекта = null;
        $this->проект = null;
        $this->руководитель = null;
        $this->заказчик = null;
        $this->подрядчики = null;
        $this->период_выполнения_работ = null;
        $this->детали_проекта = null;
        $this->тип_строительства = null;
        $this->название_папки_проекта = null;
        $this->картинка = null;
        $this->карточка_проекта = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collдатыобновленийдашбордовs) {
                foreach ($this->collдатыобновленийдашбордовs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collмтрs) {
                foreach ($this->collмтрs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collмобилизацияs) {
                foreach ($this->collмобилизацияs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collмобилизацияпомесяцамs) {
                foreach ($this->collмобилизацияпомесяцамs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collПредписанияs) {
                foreach ($this->collПредписанияs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collпроблемныевопросыs) {
                foreach ($this->collпроблемныевопросыs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collпрограммыs) {
                foreach ($this->collпрограммыs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collучасткиработs) {
                foreach ($this->collучасткиработs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collдатыобновленийдашбордовs = null;
        $this->collмтрs = null;
        $this->collмобилизацияs = null;
        $this->collмобилизацияпомесяцамs = null;
        $this->collПредписанияs = null;
        $this->collпроблемныевопросыs = null;
        $this->collпрограммыs = null;
        $this->collучасткиработs = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ПроектыTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
