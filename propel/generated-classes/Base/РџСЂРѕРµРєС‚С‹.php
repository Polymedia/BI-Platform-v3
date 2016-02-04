<?php

namespace Base;

use \Проекты as ChildПроекты;
use \ПроектыQuery as ChildПроектыQuery;
use \Exception;
use \PDO;
use Map\ПроектыTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
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
     * The value for the кодпроекта field.
     * 
     * @var        string
     */
    protected $кодпроекта;

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
     * The value for the периодвыполненияработ field.
     * 
     * @var        string
     */
    protected $периодвыполненияработ;

    /**
     * The value for the деталипроекта field.
     * 
     * @var        string
     */
    protected $деталипроекта;

    /**
     * The value for the типстроительства field.
     * 
     * @var        string
     */
    protected $типстроительства;

    /**
     * The value for the названиепапкипроекта field.
     * 
     * @var        string
     */
    protected $названиепапкипроекта;

    /**
     * The value for the картинка field.
     * 
     * @var        string
     */
    protected $картинка;

    /**
     * The value for the карточкапроекта field.
     * 
     * @var        string
     */
    protected $карточкапроекта;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

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
     * Get the [кодпроекта] column value.
     * 
     * @return string
     */
    public function getКодпроекта()
    {
        return $this->кодпроекта;
    }

    /**
     * Get the [проект] column value.
     * 
     * @return string
     */
    public function getПроект()
    {
        return $this->проект;
    }

    /**
     * Get the [руководитель] column value.
     * 
     * @return string
     */
    public function getРуководитель()
    {
        return $this->руководитель;
    }

    /**
     * Get the [заказчик] column value.
     * 
     * @return string
     */
    public function getЗаказчик()
    {
        return $this->заказчик;
    }

    /**
     * Get the [подрядчики] column value.
     * 
     * @return string
     */
    public function getПодрядчики()
    {
        return $this->подрядчики;
    }

    /**
     * Get the [периодвыполненияработ] column value.
     * 
     * @return string
     */
    public function getПериодвыполненияработ()
    {
        return $this->периодвыполненияработ;
    }

    /**
     * Get the [деталипроекта] column value.
     * 
     * @return string
     */
    public function getДеталипроекта()
    {
        return $this->деталипроекта;
    }

    /**
     * Get the [типстроительства] column value.
     * 
     * @return string
     */
    public function getТипстроительства()
    {
        return $this->типстроительства;
    }

    /**
     * Get the [названиепапкипроекта] column value.
     * 
     * @return string
     */
    public function getНазваниепапкипроекта()
    {
        return $this->названиепапкипроекта;
    }

    /**
     * Get the [картинка] column value.
     * 
     * @return string
     */
    public function getКартинка()
    {
        return $this->картинка;
    }

    /**
     * Get the [карточкапроекта] column value.
     * 
     * @return string
     */
    public function getКарточкапроекта()
    {
        return $this->карточкапроекта;
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
     * Set the value of [кодпроекта] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setКодпроекта($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->кодпроекта !== $v) {
            $this->кодпроекта = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_КОДПРОЕКТА] = true;
        }

        return $this;
    } // setКодпроекта()

    /**
     * Set the value of [проект] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setПроект($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->проект !== $v) {
            $this->проект = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ПРОЕКТ] = true;
        }

        return $this;
    } // setПроект()

    /**
     * Set the value of [руководитель] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setРуководитель($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->руководитель !== $v) {
            $this->руководитель = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_РУКОВОДИТЕЛЬ] = true;
        }

        return $this;
    } // setРуководитель()

    /**
     * Set the value of [заказчик] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setЗаказчик($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->заказчик !== $v) {
            $this->заказчик = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ЗАКАЗЧИК] = true;
        }

        return $this;
    } // setЗаказчик()

    /**
     * Set the value of [подрядчики] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setПодрядчики($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->подрядчики !== $v) {
            $this->подрядчики = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ПОДРЯДЧИКИ] = true;
        }

        return $this;
    } // setПодрядчики()

    /**
     * Set the value of [периодвыполненияработ] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setПериодвыполненияработ($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->периодвыполненияработ !== $v) {
            $this->периодвыполненияработ = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ПЕРИОДВЫПОЛНЕНИЯРАБОТ] = true;
        }

        return $this;
    } // setПериодвыполненияработ()

    /**
     * Set the value of [деталипроекта] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setДеталипроекта($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->деталипроекта !== $v) {
            $this->деталипроекта = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ДЕТАЛИПРОЕКТА] = true;
        }

        return $this;
    } // setДеталипроекта()

    /**
     * Set the value of [типстроительства] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setТипстроительства($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->типстроительства !== $v) {
            $this->типстроительства = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_ТИПСТРОИТЕЛЬСТВА] = true;
        }

        return $this;
    } // setТипстроительства()

    /**
     * Set the value of [названиепапкипроекта] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setНазваниепапкипроекта($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->названиепапкипроекта !== $v) {
            $this->названиепапкипроекта = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_НАЗВАНИЕПАПКИПРОЕКТА] = true;
        }

        return $this;
    } // setНазваниепапкипроекта()

    /**
     * Set the value of [картинка] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setКартинка($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->картинка !== $v) {
            $this->картинка = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_КАРТИНКА] = true;
        }

        return $this;
    } // setКартинка()

    /**
     * Set the value of [карточкапроекта] column.
     * 
     * @param string $v new value
     * @return $this|\Проекты The current object (for fluent API support)
     */
    public function setКарточкапроекта($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->карточкапроекта !== $v) {
            $this->карточкапроекта = $v;
            $this->modifiedColumns[ПроектыTableMap::COL_КАРТОЧКАПРОЕКТА] = true;
        }

        return $this;
    } // setКарточкапроекта()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ПроектыTableMap::translateFieldName('Кодпроекта', TableMap::TYPE_PHPNAME, $indexType)];
            $this->кодпроекта = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ПроектыTableMap::translateFieldName('Проект', TableMap::TYPE_PHPNAME, $indexType)];
            $this->проект = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ПроектыTableMap::translateFieldName('Руководитель', TableMap::TYPE_PHPNAME, $indexType)];
            $this->руководитель = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ПроектыTableMap::translateFieldName('Заказчик', TableMap::TYPE_PHPNAME, $indexType)];
            $this->заказчик = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ПроектыTableMap::translateFieldName('Подрядчики', TableMap::TYPE_PHPNAME, $indexType)];
            $this->подрядчики = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ПроектыTableMap::translateFieldName('Периодвыполненияработ', TableMap::TYPE_PHPNAME, $indexType)];
            $this->периодвыполненияработ = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ПроектыTableMap::translateFieldName('Деталипроекта', TableMap::TYPE_PHPNAME, $indexType)];
            $this->деталипроекта = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ПроектыTableMap::translateFieldName('Типстроительства', TableMap::TYPE_PHPNAME, $indexType)];
            $this->типстроительства = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ПроектыTableMap::translateFieldName('Названиепапкипроекта', TableMap::TYPE_PHPNAME, $indexType)];
            $this->названиепапкипроекта = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ПроектыTableMap::translateFieldName('Картинка', TableMap::TYPE_PHPNAME, $indexType)];
            $this->картинка = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ПроектыTableMap::translateFieldName('Карточкапроекта', TableMap::TYPE_PHPNAME, $indexType)];
            $this->карточкапроекта = (null !== $col) ? (string) $col : null;
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ПроектыTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КОДПРОЕКТА)) {
            $modifiedColumns[':p' . $index++]  = 'КодПроекта';
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
        if ($this->isColumnModified(ПроектыTableMap::COL_ПЕРИОДВЫПОЛНЕНИЯРАБОТ)) {
            $modifiedColumns[':p' . $index++]  = 'ПериодВыполненияРабот';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ДЕТАЛИПРОЕКТА)) {
            $modifiedColumns[':p' . $index++]  = 'ДеталиПроекта';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ТИПСТРОИТЕЛЬСТВА)) {
            $modifiedColumns[':p' . $index++]  = 'ТипСтроительства';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_НАЗВАНИЕПАПКИПРОЕКТА)) {
            $modifiedColumns[':p' . $index++]  = 'НазваниеПапкиПроекта';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КАРТИНКА)) {
            $modifiedColumns[':p' . $index++]  = 'Картинка';
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КАРТОЧКАПРОЕКТА)) {
            $modifiedColumns[':p' . $index++]  = 'КарточкаПроекта';
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
                    case 'КодПроекта':                        
                        $stmt->bindValue($identifier, $this->кодпроекта, PDO::PARAM_STR);
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
                    case 'ПериодВыполненияРабот':                        
                        $stmt->bindValue($identifier, $this->периодвыполненияработ, PDO::PARAM_STR);
                        break;
                    case 'ДеталиПроекта':                        
                        $stmt->bindValue($identifier, $this->деталипроекта, PDO::PARAM_STR);
                        break;
                    case 'ТипСтроительства':                        
                        $stmt->bindValue($identifier, $this->типстроительства, PDO::PARAM_STR);
                        break;
                    case 'НазваниеПапкиПроекта':                        
                        $stmt->bindValue($identifier, $this->названиепапкипроекта, PDO::PARAM_STR);
                        break;
                    case 'Картинка':                        
                        $stmt->bindValue($identifier, $this->картинка, PDO::PARAM_STR);
                        break;
                    case 'КарточкаПроекта':                        
                        $stmt->bindValue($identifier, $this->карточкапроекта, PDO::PARAM_STR);
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
                return $this->getКодпроекта();
                break;
            case 2:
                return $this->getПроект();
                break;
            case 3:
                return $this->getРуководитель();
                break;
            case 4:
                return $this->getЗаказчик();
                break;
            case 5:
                return $this->getПодрядчики();
                break;
            case 6:
                return $this->getПериодвыполненияработ();
                break;
            case 7:
                return $this->getДеталипроекта();
                break;
            case 8:
                return $this->getТипстроительства();
                break;
            case 9:
                return $this->getНазваниепапкипроекта();
                break;
            case 10:
                return $this->getКартинка();
                break;
            case 11:
                return $this->getКарточкапроекта();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Проекты'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Проекты'][$this->hashCode()] = true;
        $keys = ПроектыTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getКодпроекта(),
            $keys[2] => $this->getПроект(),
            $keys[3] => $this->getРуководитель(),
            $keys[4] => $this->getЗаказчик(),
            $keys[5] => $this->getПодрядчики(),
            $keys[6] => $this->getПериодвыполненияработ(),
            $keys[7] => $this->getДеталипроекта(),
            $keys[8] => $this->getТипстроительства(),
            $keys[9] => $this->getНазваниепапкипроекта(),
            $keys[10] => $this->getКартинка(),
            $keys[11] => $this->getКарточкапроекта(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
                $this->setКодпроекта($value);
                break;
            case 2:
                $this->setПроект($value);
                break;
            case 3:
                $this->setРуководитель($value);
                break;
            case 4:
                $this->setЗаказчик($value);
                break;
            case 5:
                $this->setПодрядчики($value);
                break;
            case 6:
                $this->setПериодвыполненияработ($value);
                break;
            case 7:
                $this->setДеталипроекта($value);
                break;
            case 8:
                $this->setТипстроительства($value);
                break;
            case 9:
                $this->setНазваниепапкипроекта($value);
                break;
            case 10:
                $this->setКартинка($value);
                break;
            case 11:
                $this->setКарточкапроекта($value);
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
            $this->setКодпроекта($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setПроект($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setРуководитель($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setЗаказчик($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setПодрядчики($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setПериодвыполненияработ($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setДеталипроекта($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setТипстроительства($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setНазваниепапкипроекта($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setКартинка($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setКарточкапроекта($arr[$keys[11]]);
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
        if ($this->isColumnModified(ПроектыTableMap::COL_КОДПРОЕКТА)) {
            $criteria->add(ПроектыTableMap::COL_КОДПРОЕКТА, $this->кодпроекта);
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
        if ($this->isColumnModified(ПроектыTableMap::COL_ПЕРИОДВЫПОЛНЕНИЯРАБОТ)) {
            $criteria->add(ПроектыTableMap::COL_ПЕРИОДВЫПОЛНЕНИЯРАБОТ, $this->периодвыполненияработ);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ДЕТАЛИПРОЕКТА)) {
            $criteria->add(ПроектыTableMap::COL_ДЕТАЛИПРОЕКТА, $this->деталипроекта);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_ТИПСТРОИТЕЛЬСТВА)) {
            $criteria->add(ПроектыTableMap::COL_ТИПСТРОИТЕЛЬСТВА, $this->типстроительства);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_НАЗВАНИЕПАПКИПРОЕКТА)) {
            $criteria->add(ПроектыTableMap::COL_НАЗВАНИЕПАПКИПРОЕКТА, $this->названиепапкипроекта);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КАРТИНКА)) {
            $criteria->add(ПроектыTableMap::COL_КАРТИНКА, $this->картинка);
        }
        if ($this->isColumnModified(ПроектыTableMap::COL_КАРТОЧКАПРОЕКТА)) {
            $criteria->add(ПроектыTableMap::COL_КАРТОЧКАПРОЕКТА, $this->карточкапроекта);
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
        throw new LogicException('The Проекты object has no primary key');

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
        $validPk = false;

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
     * Returns NULL since this table doesn't have a primary key.
     * This method exists only for BC and is deprecated!
     * @return null
     */
    public function getPrimaryKey()
    {
        return null;
    }

    /**
     * Dummy primary key setter.
     *
     * This function only exists to preserve backwards compatibility.  It is no longer
     * needed or required by the Persistent interface.  It will be removed in next BC-breaking
     * release of Propel.
     *
     * @deprecated
     */
    public function setPrimaryKey($pk)
    {
        // do nothing, because this object doesn't have any primary keys
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return ;
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
        $copyObj->setКодпроекта($this->getКодпроекта());
        $copyObj->setПроект($this->getПроект());
        $copyObj->setРуководитель($this->getРуководитель());
        $copyObj->setЗаказчик($this->getЗаказчик());
        $copyObj->setПодрядчики($this->getПодрядчики());
        $copyObj->setПериодвыполненияработ($this->getПериодвыполненияработ());
        $copyObj->setДеталипроекта($this->getДеталипроекта());
        $copyObj->setТипстроительства($this->getТипстроительства());
        $copyObj->setНазваниепапкипроекта($this->getНазваниепапкипроекта());
        $copyObj->setКартинка($this->getКартинка());
        $copyObj->setКарточкапроекта($this->getКарточкапроекта());
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->кодпроекта = null;
        $this->проект = null;
        $this->руководитель = null;
        $this->заказчик = null;
        $this->подрядчики = null;
        $this->периодвыполненияработ = null;
        $this->деталипроекта = null;
        $this->типстроительства = null;
        $this->названиепапкипроекта = null;
        $this->картинка = null;
        $this->карточкапроекта = null;
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
        } // if ($deep)

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
