<?php

namespace Base;

use \Календарь as ChildКалендарь;
use \КалендарьQuery as ChildКалендарьQuery;
use \Проекты as ChildПроекты;
use \ПроектыQuery as ChildПроектыQuery;
use \мтрQuery as ChildмтрQuery;
use \подрядчикимтр as Childподрядчикимтр;
use \подрядчикимтрQuery as ChildподрядчикимтрQuery;
use \статуссостояниятехники as Childстатуссостояниятехники;
use \статуссостояниятехникиQuery as ChildстатуссостояниятехникиQuery;
use \типытехникимтр as Childтипытехникимтр;
use \типытехникимтрQuery as ChildтипытехникимтрQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\мтрTableMap;
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
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'МТР' table.
 *
 * 
 *
* @package    propel.generator..Base
*/
abstract class мтр implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\мтрTableMap';


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
     * The value for the vin field.
     * 
     * @var        string
     */
    protected $vin;

    /**
     * The value for the тип_техники field.
     * 
     * @var        int
     */
    protected $тип_техники;

    /**
     * The value for the дата field.
     * 
     * @var        \DateTime
     */
    protected $дата;

    /**
     * The value for the состояние_техники field.
     * 
     * @var        int
     */
    protected $состояние_техники;

    /**
     * The value for the подрядчик field.
     * 
     * @var        int
     */
    protected $подрядчик;

    /**
     * The value for the проект field.
     * 
     * @var        int
     */
    protected $проект;

    /**
     * The value for the дата_отчёта field.
     * 
     * @var        \DateTime
     */
    protected $дата_отчёта;

    /**
     * @var        ChildКалендарь
     */
    protected $aКалендарь;

    /**
     * @var        Childподрядчикимтр
     */
    protected $aподрядчикимтр;

    /**
     * @var        ChildПроекты
     */
    protected $aПроекты;

    /**
     * @var        Childстатуссостояниятехники
     */
    protected $aстатуссостояниятехники;

    /**
     * @var        Childтипытехникимтр
     */
    protected $aтипытехникимтр;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\мтр object.
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
     * Compares this with another <code>мтр</code> instance.  If
     * <code>obj</code> is an instance of <code>мтр</code>, delegates to
     * <code>equals(мтр)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|мтр The current object, for fluid interface
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
     * Get the [vin] column value.
     * 
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Get the [тип_техники] column value.
     * 
     * @return int
     */
    public function getтиптехники()
    {
        return $this->тип_техники;
    }

    /**
     * Get the [optionally formatted] temporal [дата] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getдата($format = NULL)
    {
        if ($format === null) {
            return $this->дата;
        } else {
            return $this->дата instanceof \DateTime ? $this->дата->format($format) : null;
        }
    }

    /**
     * Get the [состояние_техники] column value.
     * 
     * @return int
     */
    public function getсостояниетехники()
    {
        return $this->состояние_техники;
    }

    /**
     * Get the [подрядчик] column value.
     * 
     * @return int
     */
    public function getподрядчик()
    {
        return $this->подрядчик;
    }

    /**
     * Get the [проект] column value.
     * 
     * @return int
     */
    public function getпроект()
    {
        return $this->проект;
    }

    /**
     * Get the [optionally formatted] temporal [дата_отчёта] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getдатаотчёта($format = NULL)
    {
        if ($format === null) {
            return $this->дата_отчёта;
        } else {
            return $this->дата_отчёта instanceof \DateTime ? $this->дата_отчёта->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     * 
     * @param int $v new value
     * @return $this|\мтр The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[мтрTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [vin] column.
     * 
     * @param string $v new value
     * @return $this|\мтр The current object (for fluent API support)
     */
    public function setVin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vin !== $v) {
            $this->vin = $v;
            $this->modifiedColumns[мтрTableMap::COL_VIN] = true;
        }

        return $this;
    } // setVin()

    /**
     * Set the value of [тип_техники] column.
     * 
     * @param int $v new value
     * @return $this|\мтр The current object (for fluent API support)
     */
    public function setтиптехники($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->тип_техники !== $v) {
            $this->тип_техники = $v;
            $this->modifiedColumns[мтрTableMap::COL_ТИП_ТЕХНИКИ] = true;
        }

        if ($this->aтипытехникимтр !== null && $this->aтипытехникимтр->getId() !== $v) {
            $this->aтипытехникимтр = null;
        }

        return $this;
    } // setтиптехники()

    /**
     * Sets the value of [дата] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\мтр The current object (for fluent API support)
     */
    public function setдата($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->дата !== null || $dt !== null) {
            if ($this->дата === null || $dt === null || $dt->format("Y-m-d") !== $this->дата->format("Y-m-d")) {
                $this->дата = $dt === null ? null : clone $dt;
                $this->modifiedColumns[мтрTableMap::COL_ДАТА] = true;
            }
        } // if either are not null

        if ($this->aКалендарь !== null && $this->aКалендарь->getдата() !== $v) {
            $this->aКалендарь = null;
        }

        return $this;
    } // setдата()

    /**
     * Set the value of [состояние_техники] column.
     * 
     * @param int $v new value
     * @return $this|\мтр The current object (for fluent API support)
     */
    public function setсостояниетехники($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->состояние_техники !== $v) {
            $this->состояние_техники = $v;
            $this->modifiedColumns[мтрTableMap::COL_СОСТОЯНИЕ_ТЕХНИКИ] = true;
        }

        if ($this->aстатуссостояниятехники !== null && $this->aстатуссостояниятехники->getId() !== $v) {
            $this->aстатуссостояниятехники = null;
        }

        return $this;
    } // setсостояниетехники()

    /**
     * Set the value of [подрядчик] column.
     * 
     * @param int $v new value
     * @return $this|\мтр The current object (for fluent API support)
     */
    public function setподрядчик($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->подрядчик !== $v) {
            $this->подрядчик = $v;
            $this->modifiedColumns[мтрTableMap::COL_ПОДРЯДЧИК] = true;
        }

        if ($this->aподрядчикимтр !== null && $this->aподрядчикимтр->getId() !== $v) {
            $this->aподрядчикимтр = null;
        }

        return $this;
    } // setподрядчик()

    /**
     * Set the value of [проект] column.
     * 
     * @param int $v new value
     * @return $this|\мтр The current object (for fluent API support)
     */
    public function setпроект($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->проект !== $v) {
            $this->проект = $v;
            $this->modifiedColumns[мтрTableMap::COL_ПРОЕКТ] = true;
        }

        if ($this->aПроекты !== null && $this->aПроекты->getId() !== $v) {
            $this->aПроекты = null;
        }

        return $this;
    } // setпроект()

    /**
     * Sets the value of [дата_отчёта] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\мтр The current object (for fluent API support)
     */
    public function setдатаотчёта($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->дата_отчёта !== null || $dt !== null) {
            if ($this->дата_отчёта === null || $dt === null || $dt->format("Y-m-d") !== $this->дата_отчёта->format("Y-m-d")) {
                $this->дата_отчёта = $dt === null ? null : clone $dt;
                $this->modifiedColumns[мтрTableMap::COL_ДАТА_ОТЧЁТА] = true;
            }
        } // if either are not null

        return $this;
    } // setдатаотчёта()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : мтрTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : мтрTableMap::translateFieldName('Vin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : мтрTableMap::translateFieldName('типтехники', TableMap::TYPE_PHPNAME, $indexType)];
            $this->тип_техники = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : мтрTableMap::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->дата = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : мтрTableMap::translateFieldName('состояниетехники', TableMap::TYPE_PHPNAME, $indexType)];
            $this->состояние_техники = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : мтрTableMap::translateFieldName('подрядчик', TableMap::TYPE_PHPNAME, $indexType)];
            $this->подрядчик = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : мтрTableMap::translateFieldName('проект', TableMap::TYPE_PHPNAME, $indexType)];
            $this->проект = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : мтрTableMap::translateFieldName('датаотчёта', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->дата_отчёта = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = мтрTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\мтр'), 0, $e);
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
        if ($this->aтипытехникимтр !== null && $this->тип_техники !== $this->aтипытехникимтр->getId()) {
            $this->aтипытехникимтр = null;
        }
        if ($this->aКалендарь !== null && $this->дата !== $this->aКалендарь->getдата()) {
            $this->aКалендарь = null;
        }
        if ($this->aстатуссостояниятехники !== null && $this->состояние_техники !== $this->aстатуссостояниятехники->getId()) {
            $this->aстатуссостояниятехники = null;
        }
        if ($this->aподрядчикимтр !== null && $this->подрядчик !== $this->aподрядчикимтр->getId()) {
            $this->aподрядчикимтр = null;
        }
        if ($this->aПроекты !== null && $this->проект !== $this->aПроекты->getId()) {
            $this->aПроекты = null;
        }
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
            $con = Propel::getServiceContainer()->getReadConnection(мтрTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildмтрQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aКалендарь = null;
            $this->aподрядчикимтр = null;
            $this->aПроекты = null;
            $this->aстатуссостояниятехники = null;
            $this->aтипытехникимтр = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see мтр::setDeleted()
     * @see мтр::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(мтрTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildмтрQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(мтрTableMap::DATABASE_NAME);
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
                мтрTableMap::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aКалендарь !== null) {
                if ($this->aКалендарь->isModified() || $this->aКалендарь->isNew()) {
                    $affectedRows += $this->aКалендарь->save($con);
                }
                $this->setКалендарь($this->aКалендарь);
            }

            if ($this->aподрядчикимтр !== null) {
                if ($this->aподрядчикимтр->isModified() || $this->aподрядчикимтр->isNew()) {
                    $affectedRows += $this->aподрядчикимтр->save($con);
                }
                $this->setподрядчикимтр($this->aподрядчикимтр);
            }

            if ($this->aПроекты !== null) {
                if ($this->aПроекты->isModified() || $this->aПроекты->isNew()) {
                    $affectedRows += $this->aПроекты->save($con);
                }
                $this->setПроекты($this->aПроекты);
            }

            if ($this->aстатуссостояниятехники !== null) {
                if ($this->aстатуссостояниятехники->isModified() || $this->aстатуссостояниятехники->isNew()) {
                    $affectedRows += $this->aстатуссостояниятехники->save($con);
                }
                $this->setстатуссостояниятехники($this->aстатуссостояниятехники);
            }

            if ($this->aтипытехникимтр !== null) {
                if ($this->aтипытехникимтр->isModified() || $this->aтипытехникимтр->isNew()) {
                    $affectedRows += $this->aтипытехникимтр->save($con);
                }
                $this->setтипытехникимтр($this->aтипытехникимтр);
            }

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

        $this->modifiedColumns[мтрTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . мтрTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(мтрTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(мтрTableMap::COL_VIN)) {
            $modifiedColumns[':p' . $index++]  = 'VIN';
        }
        if ($this->isColumnModified(мтрTableMap::COL_ТИП_ТЕХНИКИ)) {
            $modifiedColumns[':p' . $index++]  = 'Тип_техники';
        }
        if ($this->isColumnModified(мтрTableMap::COL_ДАТА)) {
            $modifiedColumns[':p' . $index++]  = 'Дата';
        }
        if ($this->isColumnModified(мтрTableMap::COL_СОСТОЯНИЕ_ТЕХНИКИ)) {
            $modifiedColumns[':p' . $index++]  = 'Состояние_техники';
        }
        if ($this->isColumnModified(мтрTableMap::COL_ПОДРЯДЧИК)) {
            $modifiedColumns[':p' . $index++]  = 'Подрядчик';
        }
        if ($this->isColumnModified(мтрTableMap::COL_ПРОЕКТ)) {
            $modifiedColumns[':p' . $index++]  = 'Проект';
        }
        if ($this->isColumnModified(мтрTableMap::COL_ДАТА_ОТЧЁТА)) {
            $modifiedColumns[':p' . $index++]  = 'Дата_отчёта';
        }

        $sql = sprintf(
            'INSERT INTO МТР (%s) VALUES (%s)',
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
                    case 'VIN':                        
                        $stmt->bindValue($identifier, $this->vin, PDO::PARAM_STR);
                        break;
                    case 'Тип_техники':                        
                        $stmt->bindValue($identifier, $this->тип_техники, PDO::PARAM_INT);
                        break;
                    case 'Дата':                        
                        $stmt->bindValue($identifier, $this->дата ? $this->дата->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'Состояние_техники':                        
                        $stmt->bindValue($identifier, $this->состояние_техники, PDO::PARAM_INT);
                        break;
                    case 'Подрядчик':                        
                        $stmt->bindValue($identifier, $this->подрядчик, PDO::PARAM_INT);
                        break;
                    case 'Проект':                        
                        $stmt->bindValue($identifier, $this->проект, PDO::PARAM_INT);
                        break;
                    case 'Дата_отчёта':                        
                        $stmt->bindValue($identifier, $this->дата_отчёта ? $this->дата_отчёта->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
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
        $pos = мтрTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getVin();
                break;
            case 2:
                return $this->getтиптехники();
                break;
            case 3:
                return $this->getдата();
                break;
            case 4:
                return $this->getсостояниетехники();
                break;
            case 5:
                return $this->getподрядчик();
                break;
            case 6:
                return $this->getпроект();
                break;
            case 7:
                return $this->getдатаотчёта();
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

        if (isset($alreadyDumpedObjects['мтр'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['мтр'][$this->hashCode()] = true;
        $keys = мтрTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getVin(),
            $keys[2] => $this->getтиптехники(),
            $keys[3] => $this->getдата(),
            $keys[4] => $this->getсостояниетехники(),
            $keys[5] => $this->getподрядчик(),
            $keys[6] => $this->getпроект(),
            $keys[7] => $this->getдатаотчёта(),
        );
        if ($result[$keys[3]] instanceof \DateTime) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }
        
        if ($result[$keys[7]] instanceof \DateTime) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }
        
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aКалендарь) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�алендарь';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Календарь';
                        break;
                    default:
                        $key = 'Календарь';
                }
        
                $result[$key] = $this->aКалендарь->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aподрядчикимтр) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�одрядчикимтр';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Подрядчики_МТР';
                        break;
                    default:
                        $key = 'подрядчикимтр';
                }
        
                $result[$key] = $this->aподрядчикимтр->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aПроекты) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�роекты';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Проекты';
                        break;
                    default:
                        $key = 'Проекты';
                }
        
                $result[$key] = $this->aПроекты->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aстатуссостояниятехники) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�татуссостояниятехники';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Статус_состояния_техники';
                        break;
                    default:
                        $key = 'статуссостояниятехники';
                }
        
                $result[$key] = $this->aстатуссостояниятехники->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aтипытехникимтр) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�ипытехникимтр';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Типы_техники_МТР';
                        break;
                    default:
                        $key = 'типытехникимтр';
                }
        
                $result[$key] = $this->aтипытехникимтр->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\мтр
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = мтрTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\мтр
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setVin($value);
                break;
            case 2:
                $this->setтиптехники($value);
                break;
            case 3:
                $this->setдата($value);
                break;
            case 4:
                $this->setсостояниетехники($value);
                break;
            case 5:
                $this->setподрядчик($value);
                break;
            case 6:
                $this->setпроект($value);
                break;
            case 7:
                $this->setдатаотчёта($value);
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
        $keys = мтрTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setVin($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setтиптехники($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setдата($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setсостояниетехники($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setподрядчик($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setпроект($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setдатаотчёта($arr[$keys[7]]);
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
     * @return $this|\мтр The current object, for fluid interface
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
        $criteria = new Criteria(мтрTableMap::DATABASE_NAME);

        if ($this->isColumnModified(мтрTableMap::COL_ID)) {
            $criteria->add(мтрTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(мтрTableMap::COL_VIN)) {
            $criteria->add(мтрTableMap::COL_VIN, $this->vin);
        }
        if ($this->isColumnModified(мтрTableMap::COL_ТИП_ТЕХНИКИ)) {
            $criteria->add(мтрTableMap::COL_ТИП_ТЕХНИКИ, $this->тип_техники);
        }
        if ($this->isColumnModified(мтрTableMap::COL_ДАТА)) {
            $criteria->add(мтрTableMap::COL_ДАТА, $this->дата);
        }
        if ($this->isColumnModified(мтрTableMap::COL_СОСТОЯНИЕ_ТЕХНИКИ)) {
            $criteria->add(мтрTableMap::COL_СОСТОЯНИЕ_ТЕХНИКИ, $this->состояние_техники);
        }
        if ($this->isColumnModified(мтрTableMap::COL_ПОДРЯДЧИК)) {
            $criteria->add(мтрTableMap::COL_ПОДРЯДЧИК, $this->подрядчик);
        }
        if ($this->isColumnModified(мтрTableMap::COL_ПРОЕКТ)) {
            $criteria->add(мтрTableMap::COL_ПРОЕКТ, $this->проект);
        }
        if ($this->isColumnModified(мтрTableMap::COL_ДАТА_ОТЧЁТА)) {
            $criteria->add(мтрTableMap::COL_ДАТА_ОТЧЁТА, $this->дата_отчёта);
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
        $criteria = ChildмтрQuery::create();
        $criteria->add(мтрTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \мтр (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setVin($this->getVin());
        $copyObj->setтиптехники($this->getтиптехники());
        $copyObj->setдата($this->getдата());
        $copyObj->setсостояниетехники($this->getсостояниетехники());
        $copyObj->setпроект($this->getпроект());
        $copyObj->setдатаотчёта($this->getдатаотчёта());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
            $copyObj->setподрядчик(NULL); // this is a auto-increment column, so set to default value
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
     * @return \мтр Clone of current object.
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
     * Declares an association between this object and a ChildКалендарь object.
     *
     * @param  ChildКалендарь $v
     * @return $this|\мтр The current object (for fluent API support)
     * @throws PropelException
     */
    public function setКалендарь(ChildКалендарь $v = null)
    {
        if ($v === null) {
            $this->setдата(NULL);
        } else {
            $this->setдата($v->getдата());
        }

        $this->aКалендарь = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildКалендарь object, it will not be re-added.
        if ($v !== null) {
            $v->addмтр($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildКалендарь object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildКалендарь The associated ChildКалендарь object.
     * @throws PropelException
     */
    public function getКалендарь(ConnectionInterface $con = null)
    {
        if ($this->aКалендарь === null && (($this->дата !== "" && $this->дата !== null))) {
            $this->aКалендарь = ChildКалендарьQuery::create()->findPk($this->дата, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aКалендарь->addмтрs($this);
             */
        }

        return $this->aКалендарь;
    }

    /**
     * Declares an association between this object and a Childподрядчикимтр object.
     *
     * @param  Childподрядчикимтр $v
     * @return $this|\мтр The current object (for fluent API support)
     * @throws PropelException
     */
    public function setподрядчикимтр(Childподрядчикимтр $v = null)
    {
        if ($v === null) {
            $this->setподрядчик(NULL);
        } else {
            $this->setподрядчик($v->getId());
        }

        $this->aподрядчикимтр = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childподрядчикимтр object, it will not be re-added.
        if ($v !== null) {
            $v->addмтр($this);
        }


        return $this;
    }


    /**
     * Get the associated Childподрядчикимтр object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return Childподрядчикимтр The associated Childподрядчикимтр object.
     * @throws PropelException
     */
    public function getподрядчикимтр(ConnectionInterface $con = null)
    {
        if ($this->aподрядчикимтр === null && ($this->подрядчик !== null)) {
            $this->aподрядчикимтр = ChildподрядчикимтрQuery::create()->findPk($this->подрядчик, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aподрядчикимтр->addмтрs($this);
             */
        }

        return $this->aподрядчикимтр;
    }

    /**
     * Declares an association between this object and a ChildПроекты object.
     *
     * @param  ChildПроекты $v
     * @return $this|\мтр The current object (for fluent API support)
     * @throws PropelException
     */
    public function setПроекты(ChildПроекты $v = null)
    {
        if ($v === null) {
            $this->setпроект(NULL);
        } else {
            $this->setпроект($v->getId());
        }

        $this->aПроекты = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildПроекты object, it will not be re-added.
        if ($v !== null) {
            $v->addмтр($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildПроекты object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildПроекты The associated ChildПроекты object.
     * @throws PropelException
     */
    public function getПроекты(ConnectionInterface $con = null)
    {
        if ($this->aПроекты === null && ($this->проект !== null)) {
            $this->aПроекты = ChildПроектыQuery::create()->findPk($this->проект, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aПроекты->addмтрs($this);
             */
        }

        return $this->aПроекты;
    }

    /**
     * Declares an association between this object and a Childстатуссостояниятехники object.
     *
     * @param  Childстатуссостояниятехники $v
     * @return $this|\мтр The current object (for fluent API support)
     * @throws PropelException
     */
    public function setстатуссостояниятехники(Childстатуссостояниятехники $v = null)
    {
        if ($v === null) {
            $this->setсостояниетехники(NULL);
        } else {
            $this->setсостояниетехники($v->getId());
        }

        $this->aстатуссостояниятехники = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childстатуссостояниятехники object, it will not be re-added.
        if ($v !== null) {
            $v->addмтр($this);
        }


        return $this;
    }


    /**
     * Get the associated Childстатуссостояниятехники object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return Childстатуссостояниятехники The associated Childстатуссостояниятехники object.
     * @throws PropelException
     */
    public function getстатуссостояниятехники(ConnectionInterface $con = null)
    {
        if ($this->aстатуссостояниятехники === null && ($this->состояние_техники !== null)) {
            $this->aстатуссостояниятехники = ChildстатуссостояниятехникиQuery::create()->findPk($this->состояние_техники, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aстатуссостояниятехники->addмтрs($this);
             */
        }

        return $this->aстатуссостояниятехники;
    }

    /**
     * Declares an association between this object and a Childтипытехникимтр object.
     *
     * @param  Childтипытехникимтр $v
     * @return $this|\мтр The current object (for fluent API support)
     * @throws PropelException
     */
    public function setтипытехникимтр(Childтипытехникимтр $v = null)
    {
        if ($v === null) {
            $this->setтиптехники(NULL);
        } else {
            $this->setтиптехники($v->getId());
        }

        $this->aтипытехникимтр = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childтипытехникимтр object, it will not be re-added.
        if ($v !== null) {
            $v->addмтр($this);
        }


        return $this;
    }


    /**
     * Get the associated Childтипытехникимтр object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return Childтипытехникимтр The associated Childтипытехникимтр object.
     * @throws PropelException
     */
    public function getтипытехникимтр(ConnectionInterface $con = null)
    {
        if ($this->aтипытехникимтр === null && ($this->тип_техники !== null)) {
            $this->aтипытехникимтр = ChildтипытехникимтрQuery::create()->findPk($this->тип_техники, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aтипытехникимтр->addмтрs($this);
             */
        }

        return $this->aтипытехникимтр;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aКалендарь) {
            $this->aКалендарь->removeмтр($this);
        }
        if (null !== $this->aподрядчикимтр) {
            $this->aподрядчикимтр->removeмтр($this);
        }
        if (null !== $this->aПроекты) {
            $this->aПроекты->removeмтр($this);
        }
        if (null !== $this->aстатуссостояниятехники) {
            $this->aстатуссостояниятехники->removeмтр($this);
        }
        if (null !== $this->aтипытехникимтр) {
            $this->aтипытехникимтр->removeмтр($this);
        }
        $this->id = null;
        $this->vin = null;
        $this->тип_техники = null;
        $this->дата = null;
        $this->состояние_техники = null;
        $this->подрядчик = null;
        $this->проект = null;
        $this->дата_отчёта = null;
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

        $this->aКалендарь = null;
        $this->aподрядчикимтр = null;
        $this->aПроекты = null;
        $this->aстатуссостояниятехники = null;
        $this->aтипытехникимтр = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(мтрTableMap::DEFAULT_STRING_FORMAT);
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
