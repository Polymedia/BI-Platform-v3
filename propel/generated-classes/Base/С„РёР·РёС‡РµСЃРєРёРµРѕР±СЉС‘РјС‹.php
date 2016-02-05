<?php

namespace Base;

use \Календарь as ChildКалендарь;
use \КалендарьQuery as ChildКалендарьQuery;
use \типыработ as Childтипыработ;
use \типыработQuery as ChildтипыработQuery;
use \участкиработ as Childучасткиработ;
use \участкиработQuery as ChildучасткиработQuery;
use \физическиеобъёмы as Childфизическиеобъёмы;
use \физическиеобъёмыQuery as ChildфизическиеобъёмыQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\физическиеобъёмыTableMap;
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
 * Base class that represents a row from the 'Физические_объёмы' table.
 *
 * 
 *
* @package    propel.generator..Base
*/
abstract class физическиеобъёмы implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\физическиеобъёмыTableMap';


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
     * The value for the дата field.
     * 
     * @var        \DateTime
     */
    protected $дата;

    /**
     * The value for the участок_работ field.
     * 
     * @var        int
     */
    protected $участок_работ;

    /**
     * The value for the тип_работ field.
     * 
     * @var        int
     */
    protected $тип_работ;

    /**
     * The value for the план field.
     * 
     * @var        double
     */
    protected $план;

    /**
     * The value for the факт field.
     * 
     * @var        double
     */
    protected $факт;

    /**
     * The value for the причина_отставания field.
     * 
     * @var        string
     */
    protected $причина_отставания;

    /**
     * @var        Childучасткиработ
     */
    protected $aучасткиработ;

    /**
     * @var        ChildКалендарь
     */
    protected $aКалендарь;

    /**
     * @var        Childтипыработ
     */
    protected $aтипыработ;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\физическиеобъёмы object.
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
     * Compares this with another <code>физическиеобъёмы</code> instance.  If
     * <code>obj</code> is an instance of <code>физическиеобъёмы</code>, delegates to
     * <code>equals(физическиеобъёмы)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|физическиеобъёмы The current object, for fluid interface
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
     * Get the [участок_работ] column value.
     * 
     * @return int
     */
    public function getучастокработ()
    {
        return $this->участок_работ;
    }

    /**
     * Get the [тип_работ] column value.
     * 
     * @return int
     */
    public function getтипработ()
    {
        return $this->тип_работ;
    }

    /**
     * Get the [план] column value.
     * 
     * @return double
     */
    public function getплан()
    {
        return $this->план;
    }

    /**
     * Get the [факт] column value.
     * 
     * @return double
     */
    public function getфакт()
    {
        return $this->факт;
    }

    /**
     * Get the [причина_отставания] column value.
     * 
     * @return string
     */
    public function getпричинаотставания()
    {
        return $this->причина_отставания;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param int $v new value
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[физическиеобъёмыTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Sets the value of [дата] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
     */
    public function setдата($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->дата !== null || $dt !== null) {
            if ($this->дата === null || $dt === null || $dt->format("Y-m-d") !== $this->дата->format("Y-m-d")) {
                $this->дата = $dt === null ? null : clone $dt;
                $this->modifiedColumns[физическиеобъёмыTableMap::COL_ДАТА] = true;
            }
        } // if either are not null

        if ($this->aКалендарь !== null && $this->aКалендарь->getдата() !== $v) {
            $this->aКалендарь = null;
        }

        return $this;
    } // setдата()

    /**
     * Set the value of [участок_работ] column.
     * 
     * @param int $v new value
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
     */
    public function setучастокработ($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->участок_работ !== $v) {
            $this->участок_работ = $v;
            $this->modifiedColumns[физическиеобъёмыTableMap::COL_УЧАСТОК_РАБОТ] = true;
        }

        if ($this->aучасткиработ !== null && $this->aучасткиработ->getId() !== $v) {
            $this->aучасткиработ = null;
        }

        return $this;
    } // setучастокработ()

    /**
     * Set the value of [тип_работ] column.
     * 
     * @param int $v new value
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
     */
    public function setтипработ($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->тип_работ !== $v) {
            $this->тип_работ = $v;
            $this->modifiedColumns[физическиеобъёмыTableMap::COL_ТИП_РАБОТ] = true;
        }

        if ($this->aтипыработ !== null && $this->aтипыработ->getId() !== $v) {
            $this->aтипыработ = null;
        }

        return $this;
    } // setтипработ()

    /**
     * Set the value of [план] column.
     * 
     * @param double $v new value
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
     */
    public function setплан($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->план !== $v) {
            $this->план = $v;
            $this->modifiedColumns[физическиеобъёмыTableMap::COL_ПЛАН] = true;
        }

        return $this;
    } // setплан()

    /**
     * Set the value of [факт] column.
     * 
     * @param double $v new value
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
     */
    public function setфакт($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->факт !== $v) {
            $this->факт = $v;
            $this->modifiedColumns[физическиеобъёмыTableMap::COL_ФАКТ] = true;
        }

        return $this;
    } // setфакт()

    /**
     * Set the value of [причина_отставания] column.
     * 
     * @param string $v new value
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
     */
    public function setпричинаотставания($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->причина_отставания !== $v) {
            $this->причина_отставания = $v;
            $this->modifiedColumns[физическиеобъёмыTableMap::COL_ПРИЧИНА_ОТСТАВАНИЯ] = true;
        }

        return $this;
    } // setпричинаотставания()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : физическиеобъёмыTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : физическиеобъёмыTableMap::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->дата = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : физическиеобъёмыTableMap::translateFieldName('участокработ', TableMap::TYPE_PHPNAME, $indexType)];
            $this->участок_работ = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : физическиеобъёмыTableMap::translateFieldName('типработ', TableMap::TYPE_PHPNAME, $indexType)];
            $this->тип_работ = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : физическиеобъёмыTableMap::translateFieldName('план', TableMap::TYPE_PHPNAME, $indexType)];
            $this->план = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : физическиеобъёмыTableMap::translateFieldName('факт', TableMap::TYPE_PHPNAME, $indexType)];
            $this->факт = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : физическиеобъёмыTableMap::translateFieldName('причинаотставания', TableMap::TYPE_PHPNAME, $indexType)];
            $this->причина_отставания = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = физическиеобъёмыTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\физическиеобъёмы'), 0, $e);
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
        if ($this->aКалендарь !== null && $this->дата !== $this->aКалендарь->getдата()) {
            $this->aКалендарь = null;
        }
        if ($this->aучасткиработ !== null && $this->участок_работ !== $this->aучасткиработ->getId()) {
            $this->aучасткиработ = null;
        }
        if ($this->aтипыработ !== null && $this->тип_работ !== $this->aтипыработ->getId()) {
            $this->aтипыработ = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(физическиеобъёмыTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildфизическиеобъёмыQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aучасткиработ = null;
            $this->aКалендарь = null;
            $this->aтипыработ = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see физическиеобъёмы::setDeleted()
     * @see физическиеобъёмы::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(физическиеобъёмыTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildфизическиеобъёмыQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(физическиеобъёмыTableMap::DATABASE_NAME);
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
                физическиеобъёмыTableMap::addInstanceToPool($this);
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

            if ($this->aучасткиработ !== null) {
                if ($this->aучасткиработ->isModified() || $this->aучасткиработ->isNew()) {
                    $affectedRows += $this->aучасткиработ->save($con);
                }
                $this->setучасткиработ($this->aучасткиработ);
            }

            if ($this->aКалендарь !== null) {
                if ($this->aКалендарь->isModified() || $this->aКалендарь->isNew()) {
                    $affectedRows += $this->aКалендарь->save($con);
                }
                $this->setКалендарь($this->aКалендарь);
            }

            if ($this->aтипыработ !== null) {
                if ($this->aтипыработ->isModified() || $this->aтипыработ->isNew()) {
                    $affectedRows += $this->aтипыработ->save($con);
                }
                $this->setтипыработ($this->aтипыработ);
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

        $this->modifiedColumns[физическиеобъёмыTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . физическиеобъёмыTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ДАТА)) {
            $modifiedColumns[':p' . $index++]  = 'Дата';
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_УЧАСТОК_РАБОТ)) {
            $modifiedColumns[':p' . $index++]  = 'Участок_работ';
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ТИП_РАБОТ)) {
            $modifiedColumns[':p' . $index++]  = 'Тип_работ';
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ПЛАН)) {
            $modifiedColumns[':p' . $index++]  = 'План';
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ФАКТ)) {
            $modifiedColumns[':p' . $index++]  = 'Факт';
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ПРИЧИНА_ОТСТАВАНИЯ)) {
            $modifiedColumns[':p' . $index++]  = 'Причина_отставания';
        }

        $sql = sprintf(
            'INSERT INTO Физические_объёмы (%s) VALUES (%s)',
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
                    case 'Дата':                        
                        $stmt->bindValue($identifier, $this->дата ? $this->дата->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'Участок_работ':                        
                        $stmt->bindValue($identifier, $this->участок_работ, PDO::PARAM_INT);
                        break;
                    case 'Тип_работ':                        
                        $stmt->bindValue($identifier, $this->тип_работ, PDO::PARAM_INT);
                        break;
                    case 'План':                        
                        $stmt->bindValue($identifier, $this->план, PDO::PARAM_STR);
                        break;
                    case 'Факт':                        
                        $stmt->bindValue($identifier, $this->факт, PDO::PARAM_STR);
                        break;
                    case 'Причина_отставания':                        
                        $stmt->bindValue($identifier, $this->причина_отставания, PDO::PARAM_STR);
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
        $pos = физическиеобъёмыTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getдата();
                break;
            case 2:
                return $this->getучастокработ();
                break;
            case 3:
                return $this->getтипработ();
                break;
            case 4:
                return $this->getплан();
                break;
            case 5:
                return $this->getфакт();
                break;
            case 6:
                return $this->getпричинаотставания();
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

        if (isset($alreadyDumpedObjects['физическиеобъёмы'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['физическиеобъёмы'][$this->hashCode()] = true;
        $keys = физическиеобъёмыTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getдата(),
            $keys[2] => $this->getучастокработ(),
            $keys[3] => $this->getтипработ(),
            $keys[4] => $this->getплан(),
            $keys[5] => $this->getфакт(),
            $keys[6] => $this->getпричинаотставания(),
        );
        if ($result[$keys[1]] instanceof \DateTime) {
            $result[$keys[1]] = $result[$keys[1]]->format('c');
        }
        
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aучасткиработ) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�часткиработ';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Участки_работ';
                        break;
                    default:
                        $key = 'участкиработ';
                }
        
                $result[$key] = $this->aучасткиработ->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
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
            if (null !== $this->aтипыработ) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�ипыработ';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Типы_работ';
                        break;
                    default:
                        $key = 'типыработ';
                }
        
                $result[$key] = $this->aтипыработ->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\физическиеобъёмы
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = физическиеобъёмыTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\физическиеобъёмы
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setдата($value);
                break;
            case 2:
                $this->setучастокработ($value);
                break;
            case 3:
                $this->setтипработ($value);
                break;
            case 4:
                $this->setплан($value);
                break;
            case 5:
                $this->setфакт($value);
                break;
            case 6:
                $this->setпричинаотставания($value);
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
        $keys = физическиеобъёмыTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setдата($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setучастокработ($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setтипработ($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setплан($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setфакт($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setпричинаотставания($arr[$keys[6]]);
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
     * @return $this|\физическиеобъёмы The current object, for fluid interface
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
        $criteria = new Criteria(физическиеобъёмыTableMap::DATABASE_NAME);

        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ID)) {
            $criteria->add(физическиеобъёмыTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ДАТА)) {
            $criteria->add(физическиеобъёмыTableMap::COL_ДАТА, $this->дата);
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_УЧАСТОК_РАБОТ)) {
            $criteria->add(физическиеобъёмыTableMap::COL_УЧАСТОК_РАБОТ, $this->участок_работ);
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ТИП_РАБОТ)) {
            $criteria->add(физическиеобъёмыTableMap::COL_ТИП_РАБОТ, $this->тип_работ);
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ПЛАН)) {
            $criteria->add(физическиеобъёмыTableMap::COL_ПЛАН, $this->план);
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ФАКТ)) {
            $criteria->add(физическиеобъёмыTableMap::COL_ФАКТ, $this->факт);
        }
        if ($this->isColumnModified(физическиеобъёмыTableMap::COL_ПРИЧИНА_ОТСТАВАНИЯ)) {
            $criteria->add(физическиеобъёмыTableMap::COL_ПРИЧИНА_ОТСТАВАНИЯ, $this->причина_отставания);
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
        $criteria = ChildфизическиеобъёмыQuery::create();
        $criteria->add(физическиеобъёмыTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \физическиеобъёмы (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setдата($this->getдата());
        $copyObj->setучастокработ($this->getучастокработ());
        $copyObj->setтипработ($this->getтипработ());
        $copyObj->setплан($this->getплан());
        $copyObj->setфакт($this->getфакт());
        $copyObj->setпричинаотставания($this->getпричинаотставания());
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
     * @return \физическиеобъёмы Clone of current object.
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
     * Declares an association between this object and a Childучасткиработ object.
     *
     * @param  Childучасткиработ $v
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
     * @throws PropelException
     */
    public function setучасткиработ(Childучасткиработ $v = null)
    {
        if ($v === null) {
            $this->setучастокработ(NULL);
        } else {
            $this->setучастокработ($v->getId());
        }

        $this->aучасткиработ = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childучасткиработ object, it will not be re-added.
        if ($v !== null) {
            $v->addфизическиеобъёмы($this);
        }


        return $this;
    }


    /**
     * Get the associated Childучасткиработ object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return Childучасткиработ The associated Childучасткиработ object.
     * @throws PropelException
     */
    public function getучасткиработ(ConnectionInterface $con = null)
    {
        if ($this->aучасткиработ === null && ($this->участок_работ !== null)) {
            $this->aучасткиработ = ChildучасткиработQuery::create()->findPk($this->участок_работ, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aучасткиработ->addфизическиеобъёмыs($this);
             */
        }

        return $this->aучасткиработ;
    }

    /**
     * Declares an association between this object and a ChildКалендарь object.
     *
     * @param  ChildКалендарь $v
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
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
            $v->addфизическиеобъёмы($this);
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
                $this->aКалендарь->addфизическиеобъёмыs($this);
             */
        }

        return $this->aКалендарь;
    }

    /**
     * Declares an association between this object and a Childтипыработ object.
     *
     * @param  Childтипыработ $v
     * @return $this|\физическиеобъёмы The current object (for fluent API support)
     * @throws PropelException
     */
    public function setтипыработ(Childтипыработ $v = null)
    {
        if ($v === null) {
            $this->setтипработ(NULL);
        } else {
            $this->setтипработ($v->getId());
        }

        $this->aтипыработ = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childтипыработ object, it will not be re-added.
        if ($v !== null) {
            $v->addфизическиеобъёмы($this);
        }


        return $this;
    }


    /**
     * Get the associated Childтипыработ object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return Childтипыработ The associated Childтипыработ object.
     * @throws PropelException
     */
    public function getтипыработ(ConnectionInterface $con = null)
    {
        if ($this->aтипыработ === null && ($this->тип_работ !== null)) {
            $this->aтипыработ = ChildтипыработQuery::create()->findPk($this->тип_работ, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aтипыработ->addфизическиеобъёмыs($this);
             */
        }

        return $this->aтипыработ;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aучасткиработ) {
            $this->aучасткиработ->removeфизическиеобъёмы($this);
        }
        if (null !== $this->aКалендарь) {
            $this->aКалендарь->removeфизическиеобъёмы($this);
        }
        if (null !== $this->aтипыработ) {
            $this->aтипыработ->removeфизическиеобъёмы($this);
        }
        $this->id = null;
        $this->дата = null;
        $this->участок_работ = null;
        $this->тип_работ = null;
        $this->план = null;
        $this->факт = null;
        $this->причина_отставания = null;
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

        $this->aучасткиработ = null;
        $this->aКалендарь = null;
        $this->aтипыработ = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(физическиеобъёмыTableMap::DEFAULT_STRING_FORMAT);
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
