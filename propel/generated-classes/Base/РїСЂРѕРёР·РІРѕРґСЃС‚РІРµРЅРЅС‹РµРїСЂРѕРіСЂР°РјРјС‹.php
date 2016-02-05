<?php

namespace Base;

use \года as Childгода;
use \годаQuery as ChildгодаQuery;
use \месяца as Childмесяца;
use \месяцаQuery as ChildмесяцаQuery;
use \программы as Childпрограммы;
use \программыQuery as ChildпрограммыQuery;
use \производственныепрограммы as Childпроизводственныепрограммы;
use \производственныепрограммыQuery as ChildпроизводственныепрограммыQuery;
use \Exception;
use \PDO;
use Map\производственныепрограммыTableMap;
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
 * Base class that represents a row from the 'Производственные_программы' table.
 *
 * 
 *
* @package    propel.generator..Base
*/
abstract class производственныепрограммы implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\производственныепрограммыTableMap';


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
     * The value for the тип_программы field.
     * 
     * @var        int
     */
    protected $тип_программы;

    /**
     * The value for the год field.
     * 
     * @var        int
     */
    protected $год;

    /**
     * The value for the месяц field.
     * 
     * @var        int
     */
    protected $месяц;

    /**
     * The value for the план field.
     * 
     * @var        int
     */
    protected $план;

    /**
     * The value for the факт field.
     * 
     * @var        int
     */
    protected $факт;

    /**
     * @var        Childпрограммы
     */
    protected $aпрограммы;

    /**
     * @var        Childмесяца
     */
    protected $aмесяца;

    /**
     * @var        Childгода
     */
    protected $aгода;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\производственныепрограммы object.
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
     * Compares this with another <code>производственныепрограммы</code> instance.  If
     * <code>obj</code> is an instance of <code>производственныепрограммы</code>, delegates to
     * <code>equals(производственныепрограммы)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|производственныепрограммы The current object, for fluid interface
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
     * Get the [тип_программы] column value.
     * 
     * @return int
     */
    public function getтиппрограммы()
    {
        return $this->тип_программы;
    }

    /**
     * Get the [год] column value.
     * 
     * @return int
     */
    public function getгод()
    {
        return $this->год;
    }

    /**
     * Get the [месяц] column value.
     * 
     * @return int
     */
    public function getмесяц()
    {
        return $this->месяц;
    }

    /**
     * Get the [план] column value.
     * 
     * @return int
     */
    public function getплан()
    {
        return $this->план;
    }

    /**
     * Get the [факт] column value.
     * 
     * @return int
     */
    public function getфакт()
    {
        return $this->факт;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param int $v new value
     * @return $this|\производственныепрограммы The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[производственныепрограммыTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [тип_программы] column.
     * 
     * @param int $v new value
     * @return $this|\производственныепрограммы The current object (for fluent API support)
     */
    public function setтиппрограммы($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->тип_программы !== $v) {
            $this->тип_программы = $v;
            $this->modifiedColumns[производственныепрограммыTableMap::COL_ТИП_ПРОГРАММЫ] = true;
        }

        if ($this->aпрограммы !== null && $this->aпрограммы->getId() !== $v) {
            $this->aпрограммы = null;
        }

        return $this;
    } // setтиппрограммы()

    /**
     * Set the value of [год] column.
     * 
     * @param int $v new value
     * @return $this|\производственныепрограммы The current object (for fluent API support)
     */
    public function setгод($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->год !== $v) {
            $this->год = $v;
            $this->modifiedColumns[производственныепрограммыTableMap::COL_ГОД] = true;
        }

        if ($this->aгода !== null && $this->aгода->getId() !== $v) {
            $this->aгода = null;
        }

        return $this;
    } // setгод()

    /**
     * Set the value of [месяц] column.
     * 
     * @param int $v new value
     * @return $this|\производственныепрограммы The current object (for fluent API support)
     */
    public function setмесяц($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->месяц !== $v) {
            $this->месяц = $v;
            $this->modifiedColumns[производственныепрограммыTableMap::COL_МЕСЯЦ] = true;
        }

        if ($this->aмесяца !== null && $this->aмесяца->getId() !== $v) {
            $this->aмесяца = null;
        }

        return $this;
    } // setмесяц()

    /**
     * Set the value of [план] column.
     * 
     * @param int $v new value
     * @return $this|\производственныепрограммы The current object (for fluent API support)
     */
    public function setплан($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->план !== $v) {
            $this->план = $v;
            $this->modifiedColumns[производственныепрограммыTableMap::COL_ПЛАН] = true;
        }

        return $this;
    } // setплан()

    /**
     * Set the value of [факт] column.
     * 
     * @param int $v new value
     * @return $this|\производственныепрограммы The current object (for fluent API support)
     */
    public function setфакт($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->факт !== $v) {
            $this->факт = $v;
            $this->modifiedColumns[производственныепрограммыTableMap::COL_ФАКТ] = true;
        }

        return $this;
    } // setфакт()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : производственныепрограммыTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : производственныепрограммыTableMap::translateFieldName('типпрограммы', TableMap::TYPE_PHPNAME, $indexType)];
            $this->тип_программы = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : производственныепрограммыTableMap::translateFieldName('год', TableMap::TYPE_PHPNAME, $indexType)];
            $this->год = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : производственныепрограммыTableMap::translateFieldName('месяц', TableMap::TYPE_PHPNAME, $indexType)];
            $this->месяц = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : производственныепрограммыTableMap::translateFieldName('план', TableMap::TYPE_PHPNAME, $indexType)];
            $this->план = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : производственныепрограммыTableMap::translateFieldName('факт', TableMap::TYPE_PHPNAME, $indexType)];
            $this->факт = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = производственныепрограммыTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\производственныепрограммы'), 0, $e);
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
        if ($this->aпрограммы !== null && $this->тип_программы !== $this->aпрограммы->getId()) {
            $this->aпрограммы = null;
        }
        if ($this->aгода !== null && $this->год !== $this->aгода->getId()) {
            $this->aгода = null;
        }
        if ($this->aмесяца !== null && $this->месяц !== $this->aмесяца->getId()) {
            $this->aмесяца = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(производственныепрограммыTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildпроизводственныепрограммыQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aпрограммы = null;
            $this->aмесяца = null;
            $this->aгода = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see производственныепрограммы::setDeleted()
     * @see производственныепрограммы::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(производственныепрограммыTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildпроизводственныепрограммыQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(производственныепрограммыTableMap::DATABASE_NAME);
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
                производственныепрограммыTableMap::addInstanceToPool($this);
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

            if ($this->aпрограммы !== null) {
                if ($this->aпрограммы->isModified() || $this->aпрограммы->isNew()) {
                    $affectedRows += $this->aпрограммы->save($con);
                }
                $this->setпрограммы($this->aпрограммы);
            }

            if ($this->aмесяца !== null) {
                if ($this->aмесяца->isModified() || $this->aмесяца->isNew()) {
                    $affectedRows += $this->aмесяца->save($con);
                }
                $this->setмесяца($this->aмесяца);
            }

            if ($this->aгода !== null) {
                if ($this->aгода->isModified() || $this->aгода->isNew()) {
                    $affectedRows += $this->aгода->save($con);
                }
                $this->setгода($this->aгода);
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

        $this->modifiedColumns[производственныепрограммыTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . производственныепрограммыTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ТИП_ПРОГРАММЫ)) {
            $modifiedColumns[':p' . $index++]  = 'Тип_программы';
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ГОД)) {
            $modifiedColumns[':p' . $index++]  = 'Год';
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_МЕСЯЦ)) {
            $modifiedColumns[':p' . $index++]  = 'Месяц';
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ПЛАН)) {
            $modifiedColumns[':p' . $index++]  = 'План';
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ФАКТ)) {
            $modifiedColumns[':p' . $index++]  = 'Факт';
        }

        $sql = sprintf(
            'INSERT INTO Производственные_программы (%s) VALUES (%s)',
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
                    case 'Тип_программы':                        
                        $stmt->bindValue($identifier, $this->тип_программы, PDO::PARAM_INT);
                        break;
                    case 'Год':                        
                        $stmt->bindValue($identifier, $this->год, PDO::PARAM_INT);
                        break;
                    case 'Месяц':                        
                        $stmt->bindValue($identifier, $this->месяц, PDO::PARAM_INT);
                        break;
                    case 'План':                        
                        $stmt->bindValue($identifier, $this->план, PDO::PARAM_INT);
                        break;
                    case 'Факт':                        
                        $stmt->bindValue($identifier, $this->факт, PDO::PARAM_INT);
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
        $pos = производственныепрограммыTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getтиппрограммы();
                break;
            case 2:
                return $this->getгод();
                break;
            case 3:
                return $this->getмесяц();
                break;
            case 4:
                return $this->getплан();
                break;
            case 5:
                return $this->getфакт();
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

        if (isset($alreadyDumpedObjects['производственныепрограммы'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['производственныепрограммы'][$this->hashCode()] = true;
        $keys = производственныепрограммыTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getтиппрограммы(),
            $keys[2] => $this->getгод(),
            $keys[3] => $this->getмесяц(),
            $keys[4] => $this->getплан(),
            $keys[5] => $this->getфакт(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aпрограммы) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�рограммы';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Программы';
                        break;
                    default:
                        $key = 'программы';
                }
        
                $result[$key] = $this->aпрограммы->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aмесяца) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�есяца';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Месяца';
                        break;
                    default:
                        $key = 'месяца';
                }
        
                $result[$key] = $this->aмесяца->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aгода) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�ода';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Года';
                        break;
                    default:
                        $key = 'года';
                }
        
                $result[$key] = $this->aгода->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\производственныепрограммы
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = производственныепрограммыTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\производственныепрограммы
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setтиппрограммы($value);
                break;
            case 2:
                $this->setгод($value);
                break;
            case 3:
                $this->setмесяц($value);
                break;
            case 4:
                $this->setплан($value);
                break;
            case 5:
                $this->setфакт($value);
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
        $keys = производственныепрограммыTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setтиппрограммы($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setгод($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setмесяц($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setплан($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setфакт($arr[$keys[5]]);
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
     * @return $this|\производственныепрограммы The current object, for fluid interface
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
        $criteria = new Criteria(производственныепрограммыTableMap::DATABASE_NAME);

        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ID)) {
            $criteria->add(производственныепрограммыTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ТИП_ПРОГРАММЫ)) {
            $criteria->add(производственныепрограммыTableMap::COL_ТИП_ПРОГРАММЫ, $this->тип_программы);
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ГОД)) {
            $criteria->add(производственныепрограммыTableMap::COL_ГОД, $this->год);
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_МЕСЯЦ)) {
            $criteria->add(производственныепрограммыTableMap::COL_МЕСЯЦ, $this->месяц);
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ПЛАН)) {
            $criteria->add(производственныепрограммыTableMap::COL_ПЛАН, $this->план);
        }
        if ($this->isColumnModified(производственныепрограммыTableMap::COL_ФАКТ)) {
            $criteria->add(производственныепрограммыTableMap::COL_ФАКТ, $this->факт);
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
        $criteria = ChildпроизводственныепрограммыQuery::create();
        $criteria->add(производственныепрограммыTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \производственныепрограммы (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setтиппрограммы($this->getтиппрограммы());
        $copyObj->setгод($this->getгод());
        $copyObj->setмесяц($this->getмесяц());
        $copyObj->setплан($this->getплан());
        $copyObj->setфакт($this->getфакт());
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
     * @return \производственныепрограммы Clone of current object.
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
     * Declares an association between this object and a Childпрограммы object.
     *
     * @param  Childпрограммы $v
     * @return $this|\производственныепрограммы The current object (for fluent API support)
     * @throws PropelException
     */
    public function setпрограммы(Childпрограммы $v = null)
    {
        if ($v === null) {
            $this->setтиппрограммы(NULL);
        } else {
            $this->setтиппрограммы($v->getId());
        }

        $this->aпрограммы = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childпрограммы object, it will not be re-added.
        if ($v !== null) {
            $v->addпроизводственныепрограммы($this);
        }


        return $this;
    }


    /**
     * Get the associated Childпрограммы object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return Childпрограммы The associated Childпрограммы object.
     * @throws PropelException
     */
    public function getпрограммы(ConnectionInterface $con = null)
    {
        if ($this->aпрограммы === null && ($this->тип_программы !== null)) {
            $this->aпрограммы = ChildпрограммыQuery::create()->findPk($this->тип_программы, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aпрограммы->addпроизводственныепрограммыs($this);
             */
        }

        return $this->aпрограммы;
    }

    /**
     * Declares an association between this object and a Childмесяца object.
     *
     * @param  Childмесяца $v
     * @return $this|\производственныепрограммы The current object (for fluent API support)
     * @throws PropelException
     */
    public function setмесяца(Childмесяца $v = null)
    {
        if ($v === null) {
            $this->setмесяц(NULL);
        } else {
            $this->setмесяц($v->getId());
        }

        $this->aмесяца = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childмесяца object, it will not be re-added.
        if ($v !== null) {
            $v->addпроизводственныепрограммы($this);
        }


        return $this;
    }


    /**
     * Get the associated Childмесяца object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return Childмесяца The associated Childмесяца object.
     * @throws PropelException
     */
    public function getмесяца(ConnectionInterface $con = null)
    {
        if ($this->aмесяца === null && ($this->месяц !== null)) {
            $this->aмесяца = ChildмесяцаQuery::create()->findPk($this->месяц, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aмесяца->addпроизводственныепрограммыs($this);
             */
        }

        return $this->aмесяца;
    }

    /**
     * Declares an association between this object and a Childгода object.
     *
     * @param  Childгода $v
     * @return $this|\производственныепрограммы The current object (for fluent API support)
     * @throws PropelException
     */
    public function setгода(Childгода $v = null)
    {
        if ($v === null) {
            $this->setгод(NULL);
        } else {
            $this->setгод($v->getId());
        }

        $this->aгода = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childгода object, it will not be re-added.
        if ($v !== null) {
            $v->addпроизводственныепрограммы($this);
        }


        return $this;
    }


    /**
     * Get the associated Childгода object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return Childгода The associated Childгода object.
     * @throws PropelException
     */
    public function getгода(ConnectionInterface $con = null)
    {
        if ($this->aгода === null && ($this->год !== null)) {
            $this->aгода = ChildгодаQuery::create()->findPk($this->год, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aгода->addпроизводственныепрограммыs($this);
             */
        }

        return $this->aгода;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aпрограммы) {
            $this->aпрограммы->removeпроизводственныепрограммы($this);
        }
        if (null !== $this->aмесяца) {
            $this->aмесяца->removeпроизводственныепрограммы($this);
        }
        if (null !== $this->aгода) {
            $this->aгода->removeпроизводственныепрограммы($this);
        }
        $this->id = null;
        $this->тип_программы = null;
        $this->год = null;
        $this->месяц = null;
        $this->план = null;
        $this->факт = null;
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

        $this->aпрограммы = null;
        $this->aмесяца = null;
        $this->aгода = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(производственныепрограммыTableMap::DEFAULT_STRING_FORMAT);
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
