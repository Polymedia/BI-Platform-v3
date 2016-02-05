<?php

namespace Base;

use \Календарь as ChildКалендарь;
use \КалендарьQuery as ChildКалендарьQuery;
use \КонтролирующиеОрганы as ChildКонтролирующиеОрганы;
use \КонтролирующиеОрганыQuery as ChildКонтролирующиеОрганыQuery;
use \ПодрядчикиПредписания as ChildПодрядчикиПредписания;
use \ПодрядчикиПредписанияQuery as ChildПодрядчикиПредписанияQuery;
use \ПредписанияQuery as ChildПредписанияQuery;
use \Проекты as ChildПроекты;
use \ПроектыQuery as ChildПроектыQuery;
use \СтатусыЗаявкиЗавершение as ChildСтатусыЗаявкиЗавершение;
use \СтатусыЗаявкиЗавершениеQuery as ChildСтатусыЗаявкиЗавершениеQuery;
use \СтатусыЗаявкиПросрочка as ChildСтатусыЗаявкиПросрочка;
use \СтатусыЗаявкиПросрочкаQuery as ChildСтатусыЗаявкиПросрочкаQuery;
use \ТипыЗамечаний as ChildТипыЗамечаний;
use \ТипыЗамечанийQuery as ChildТипыЗамечанийQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ПредписанияTableMap;
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
 * Base class that represents a row from the 'Предписания' table.
 *
 * 
 *
* @package    propel.generator..Base
*/
abstract class Предписания implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ПредписанияTableMap';


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
     * The value for the контролирующий_орган field.
     * 
     * @var        int
     */
    protected $контролирующий_орган;

    /**
     * The value for the подрядчик field.
     * 
     * @var        int
     */
    protected $подрядчик;

    /**
     * The value for the дата_выдачи field.
     * 
     * @var        \DateTime
     */
    protected $дата_выдачи;

    /**
     * The value for the плановая_дата_устранения field.
     * 
     * @var        \DateTime
     */
    protected $плановая_дата_устранения;

    /**
     * The value for the фактическая_дата_устранения field.
     * 
     * @var        \DateTime
     */
    protected $фактическая_дата_устранения;

    /**
     * The value for the тип_замечания field.
     * 
     * @var        int
     */
    protected $тип_замечания;

    /**
     * The value for the проект field.
     * 
     * @var        int
     */
    protected $проект;

    /**
     * The value for the статус_заявки_завершение field.
     * 
     * @var        int
     */
    protected $статус_заявки_завершение;

    /**
     * The value for the статус_заявки_просрочка field.
     * 
     * @var        int
     */
    protected $статус_заявки_просрочка;

    /**
     * @var        ChildКалендарь
     */
    protected $aКалендарьRelatedByдатавыдачи;

    /**
     * @var        ChildКонтролирующиеОрганы
     */
    protected $aКонтролирующиеОрганы;

    /**
     * @var        ChildКалендарь
     */
    protected $aКалендарьRelatedByплановаядатаустранения;

    /**
     * @var        ChildПодрядчикиПредписания
     */
    protected $aПодрядчикиПредписания;

    /**
     * @var        ChildПроекты
     */
    protected $aПроекты;

    /**
     * @var        ChildСтатусыЗаявкиЗавершение
     */
    protected $aСтатусыЗаявкиЗавершение;

    /**
     * @var        ChildСтатусыЗаявкиПросрочка
     */
    protected $aСтатусыЗаявкиПросрочка;

    /**
     * @var        ChildТипыЗамечаний
     */
    protected $aТипыЗамечаний;

    /**
     * @var        ChildКалендарь
     */
    protected $aКалендарьRelatedByфактическаядатаустранения;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\Предписания object.
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
     * Compares this with another <code>Предписания</code> instance.  If
     * <code>obj</code> is an instance of <code>Предписания</code>, delegates to
     * <code>equals(Предписания)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Предписания The current object, for fluid interface
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
     * Get the [контролирующий_орган] column value.
     * 
     * @return int
     */
    public function getконтролирующийорган()
    {
        return $this->контролирующий_орган;
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
     * Get the [optionally formatted] temporal [дата_выдачи] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getдатавыдачи($format = NULL)
    {
        if ($format === null) {
            return $this->дата_выдачи;
        } else {
            return $this->дата_выдачи instanceof \DateTime ? $this->дата_выдачи->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [плановая_дата_устранения] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getплановаядатаустранения($format = NULL)
    {
        if ($format === null) {
            return $this->плановая_дата_устранения;
        } else {
            return $this->плановая_дата_устранения instanceof \DateTime ? $this->плановая_дата_устранения->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [фактическая_дата_устранения] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getфактическаядатаустранения($format = NULL)
    {
        if ($format === null) {
            return $this->фактическая_дата_устранения;
        } else {
            return $this->фактическая_дата_устранения instanceof \DateTime ? $this->фактическая_дата_устранения->format($format) : null;
        }
    }

    /**
     * Get the [тип_замечания] column value.
     * 
     * @return int
     */
    public function getтипзамечания()
    {
        return $this->тип_замечания;
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
     * Get the [статус_заявки_завершение] column value.
     * 
     * @return int
     */
    public function getстатусзаявкизавершение()
    {
        return $this->статус_заявки_завершение;
    }

    /**
     * Get the [статус_заявки_просрочка] column value.
     * 
     * @return int
     */
    public function getстатусзаявкипросрочка()
    {
        return $this->статус_заявки_просрочка;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param int $v new value
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ПредписанияTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [контролирующий_орган] column.
     * 
     * @param int $v new value
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setконтролирующийорган($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->контролирующий_орган !== $v) {
            $this->контролирующий_орган = $v;
            $this->modifiedColumns[ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙ_ОРГАН] = true;
        }

        if ($this->aКонтролирующиеОрганы !== null && $this->aКонтролирующиеОрганы->getId() !== $v) {
            $this->aКонтролирующиеОрганы = null;
        }

        return $this;
    } // setконтролирующийорган()

    /**
     * Set the value of [подрядчик] column.
     * 
     * @param int $v new value
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setподрядчик($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->подрядчик !== $v) {
            $this->подрядчик = $v;
            $this->modifiedColumns[ПредписанияTableMap::COL_ПОДРЯДЧИК] = true;
        }

        if ($this->aПодрядчикиПредписания !== null && $this->aПодрядчикиПредписания->getId() !== $v) {
            $this->aПодрядчикиПредписания = null;
        }

        return $this;
    } // setподрядчик()

    /**
     * Sets the value of [дата_выдачи] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setдатавыдачи($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->дата_выдачи !== null || $dt !== null) {
            if ($this->дата_выдачи === null || $dt === null || $dt->format("Y-m-d") !== $this->дата_выдачи->format("Y-m-d")) {
                $this->дата_выдачи = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ПредписанияTableMap::COL_ДАТА_ВЫДАЧИ] = true;
            }
        } // if either are not null

        if ($this->aКалендарьRelatedByдатавыдачи !== null && $this->aКалендарьRelatedByдатавыдачи->getдата() !== $v) {
            $this->aКалендарьRelatedByдатавыдачи = null;
        }

        return $this;
    } // setдатавыдачи()

    /**
     * Sets the value of [плановая_дата_устранения] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setплановаядатаустранения($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->плановая_дата_устранения !== null || $dt !== null) {
            if ($this->плановая_дата_устранения === null || $dt === null || $dt->format("Y-m-d") !== $this->плановая_дата_устранения->format("Y-m-d")) {
                $this->плановая_дата_устранения = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ПредписанияTableMap::COL_ПЛАНОВАЯ_ДАТА_УСТРАНЕНИЯ] = true;
            }
        } // if either are not null

        if ($this->aКалендарьRelatedByплановаядатаустранения !== null && $this->aКалендарьRelatedByплановаядатаустранения->getдата() !== $v) {
            $this->aКалендарьRelatedByплановаядатаустранения = null;
        }

        return $this;
    } // setплановаядатаустранения()

    /**
     * Sets the value of [фактическая_дата_устранения] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setфактическаядатаустранения($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->фактическая_дата_устранения !== null || $dt !== null) {
            if ($this->фактическая_дата_устранения === null || $dt === null || $dt->format("Y-m-d") !== $this->фактическая_дата_устранения->format("Y-m-d")) {
                $this->фактическая_дата_устранения = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ПредписанияTableMap::COL_ФАКТИЧЕСКАЯ_ДАТА_УСТРАНЕНИЯ] = true;
            }
        } // if either are not null

        if ($this->aКалендарьRelatedByфактическаядатаустранения !== null && $this->aКалендарьRelatedByфактическаядатаустранения->getдата() !== $v) {
            $this->aКалендарьRelatedByфактическаядатаустранения = null;
        }

        return $this;
    } // setфактическаядатаустранения()

    /**
     * Set the value of [тип_замечания] column.
     * 
     * @param int $v new value
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setтипзамечания($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->тип_замечания !== $v) {
            $this->тип_замечания = $v;
            $this->modifiedColumns[ПредписанияTableMap::COL_ТИП_ЗАМЕЧАНИЯ] = true;
        }

        if ($this->aТипыЗамечаний !== null && $this->aТипыЗамечаний->getId() !== $v) {
            $this->aТипыЗамечаний = null;
        }

        return $this;
    } // setтипзамечания()

    /**
     * Set the value of [проект] column.
     * 
     * @param int $v new value
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setпроект($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->проект !== $v) {
            $this->проект = $v;
            $this->modifiedColumns[ПредписанияTableMap::COL_ПРОЕКТ] = true;
        }

        if ($this->aПроекты !== null && $this->aПроекты->getId() !== $v) {
            $this->aПроекты = null;
        }

        return $this;
    } // setпроект()

    /**
     * Set the value of [статус_заявки_завершение] column.
     * 
     * @param int $v new value
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setстатусзаявкизавершение($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->статус_заявки_завершение !== $v) {
            $this->статус_заявки_завершение = $v;
            $this->modifiedColumns[ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ЗАВЕРШЕНИЕ] = true;
        }

        if ($this->aСтатусыЗаявкиЗавершение !== null && $this->aСтатусыЗаявкиЗавершение->getId() !== $v) {
            $this->aСтатусыЗаявкиЗавершение = null;
        }

        return $this;
    } // setстатусзаявкизавершение()

    /**
     * Set the value of [статус_заявки_просрочка] column.
     * 
     * @param int $v new value
     * @return $this|\Предписания The current object (for fluent API support)
     */
    public function setстатусзаявкипросрочка($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->статус_заявки_просрочка !== $v) {
            $this->статус_заявки_просрочка = $v;
            $this->modifiedColumns[ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ПРОСРОЧКА] = true;
        }

        if ($this->aСтатусыЗаявкиПросрочка !== null && $this->aСтатусыЗаявкиПросрочка->getId() !== $v) {
            $this->aСтатусыЗаявкиПросрочка = null;
        }

        return $this;
    } // setстатусзаявкипросрочка()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ПредписанияTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ПредписанияTableMap::translateFieldName('контролирующийорган', TableMap::TYPE_PHPNAME, $indexType)];
            $this->контролирующий_орган = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ПредписанияTableMap::translateFieldName('подрядчик', TableMap::TYPE_PHPNAME, $indexType)];
            $this->подрядчик = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ПредписанияTableMap::translateFieldName('датавыдачи', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->дата_выдачи = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ПредписанияTableMap::translateFieldName('плановаядатаустранения', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->плановая_дата_устранения = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ПредписанияTableMap::translateFieldName('фактическаядатаустранения', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->фактическая_дата_устранения = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ПредписанияTableMap::translateFieldName('типзамечания', TableMap::TYPE_PHPNAME, $indexType)];
            $this->тип_замечания = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ПредписанияTableMap::translateFieldName('проект', TableMap::TYPE_PHPNAME, $indexType)];
            $this->проект = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ПредписанияTableMap::translateFieldName('статусзаявкизавершение', TableMap::TYPE_PHPNAME, $indexType)];
            $this->статус_заявки_завершение = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ПредписанияTableMap::translateFieldName('статусзаявкипросрочка', TableMap::TYPE_PHPNAME, $indexType)];
            $this->статус_заявки_просрочка = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = ПредписанияTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Предписания'), 0, $e);
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
        if ($this->aКонтролирующиеОрганы !== null && $this->контролирующий_орган !== $this->aКонтролирующиеОрганы->getId()) {
            $this->aКонтролирующиеОрганы = null;
        }
        if ($this->aПодрядчикиПредписания !== null && $this->подрядчик !== $this->aПодрядчикиПредписания->getId()) {
            $this->aПодрядчикиПредписания = null;
        }
        if ($this->aКалендарьRelatedByдатавыдачи !== null && $this->дата_выдачи !== $this->aКалендарьRelatedByдатавыдачи->getдата()) {
            $this->aКалендарьRelatedByдатавыдачи = null;
        }
        if ($this->aКалендарьRelatedByплановаядатаустранения !== null && $this->плановая_дата_устранения !== $this->aКалендарьRelatedByплановаядатаустранения->getдата()) {
            $this->aКалендарьRelatedByплановаядатаустранения = null;
        }
        if ($this->aКалендарьRelatedByфактическаядатаустранения !== null && $this->фактическая_дата_устранения !== $this->aКалендарьRelatedByфактическаядатаустранения->getдата()) {
            $this->aКалендарьRelatedByфактическаядатаустранения = null;
        }
        if ($this->aТипыЗамечаний !== null && $this->тип_замечания !== $this->aТипыЗамечаний->getId()) {
            $this->aТипыЗамечаний = null;
        }
        if ($this->aПроекты !== null && $this->проект !== $this->aПроекты->getId()) {
            $this->aПроекты = null;
        }
        if ($this->aСтатусыЗаявкиЗавершение !== null && $this->статус_заявки_завершение !== $this->aСтатусыЗаявкиЗавершение->getId()) {
            $this->aСтатусыЗаявкиЗавершение = null;
        }
        if ($this->aСтатусыЗаявкиПросрочка !== null && $this->статус_заявки_просрочка !== $this->aСтатусыЗаявкиПросрочка->getId()) {
            $this->aСтатусыЗаявкиПросрочка = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(ПредписанияTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildПредписанияQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aКалендарьRelatedByдатавыдачи = null;
            $this->aКонтролирующиеОрганы = null;
            $this->aКалендарьRelatedByплановаядатаустранения = null;
            $this->aПодрядчикиПредписания = null;
            $this->aПроекты = null;
            $this->aСтатусыЗаявкиЗавершение = null;
            $this->aСтатусыЗаявкиПросрочка = null;
            $this->aТипыЗамечаний = null;
            $this->aКалендарьRelatedByфактическаядатаустранения = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Предписания::setDeleted()
     * @see Предписания::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПредписанияTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildПредписанияQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ПредписанияTableMap::DATABASE_NAME);
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
                ПредписанияTableMap::addInstanceToPool($this);
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

            if ($this->aКалендарьRelatedByдатавыдачи !== null) {
                if ($this->aКалендарьRelatedByдатавыдачи->isModified() || $this->aКалендарьRelatedByдатавыдачи->isNew()) {
                    $affectedRows += $this->aКалендарьRelatedByдатавыдачи->save($con);
                }
                $this->setКалендарьRelatedByдатавыдачи($this->aКалендарьRelatedByдатавыдачи);
            }

            if ($this->aКонтролирующиеОрганы !== null) {
                if ($this->aКонтролирующиеОрганы->isModified() || $this->aКонтролирующиеОрганы->isNew()) {
                    $affectedRows += $this->aКонтролирующиеОрганы->save($con);
                }
                $this->setКонтролирующиеОрганы($this->aКонтролирующиеОрганы);
            }

            if ($this->aКалендарьRelatedByплановаядатаустранения !== null) {
                if ($this->aКалендарьRelatedByплановаядатаустранения->isModified() || $this->aКалендарьRelatedByплановаядатаустранения->isNew()) {
                    $affectedRows += $this->aКалендарьRelatedByплановаядатаустранения->save($con);
                }
                $this->setКалендарьRelatedByплановаядатаустранения($this->aКалендарьRelatedByплановаядатаустранения);
            }

            if ($this->aПодрядчикиПредписания !== null) {
                if ($this->aПодрядчикиПредписания->isModified() || $this->aПодрядчикиПредписания->isNew()) {
                    $affectedRows += $this->aПодрядчикиПредписания->save($con);
                }
                $this->setПодрядчикиПредписания($this->aПодрядчикиПредписания);
            }

            if ($this->aПроекты !== null) {
                if ($this->aПроекты->isModified() || $this->aПроекты->isNew()) {
                    $affectedRows += $this->aПроекты->save($con);
                }
                $this->setПроекты($this->aПроекты);
            }

            if ($this->aСтатусыЗаявкиЗавершение !== null) {
                if ($this->aСтатусыЗаявкиЗавершение->isModified() || $this->aСтатусыЗаявкиЗавершение->isNew()) {
                    $affectedRows += $this->aСтатусыЗаявкиЗавершение->save($con);
                }
                $this->setСтатусыЗаявкиЗавершение($this->aСтатусыЗаявкиЗавершение);
            }

            if ($this->aСтатусыЗаявкиПросрочка !== null) {
                if ($this->aСтатусыЗаявкиПросрочка->isModified() || $this->aСтатусыЗаявкиПросрочка->isNew()) {
                    $affectedRows += $this->aСтатусыЗаявкиПросрочка->save($con);
                }
                $this->setСтатусыЗаявкиПросрочка($this->aСтатусыЗаявкиПросрочка);
            }

            if ($this->aТипыЗамечаний !== null) {
                if ($this->aТипыЗамечаний->isModified() || $this->aТипыЗамечаний->isNew()) {
                    $affectedRows += $this->aТипыЗамечаний->save($con);
                }
                $this->setТипыЗамечаний($this->aТипыЗамечаний);
            }

            if ($this->aКалендарьRelatedByфактическаядатаустранения !== null) {
                if ($this->aКалендарьRelatedByфактическаядатаустранения->isModified() || $this->aКалендарьRelatedByфактическаядатаустранения->isNew()) {
                    $affectedRows += $this->aКалендарьRelatedByфактическаядатаустранения->save($con);
                }
                $this->setКалендарьRelatedByфактическаядатаустранения($this->aКалендарьRelatedByфактическаядатаустранения);
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

        $this->modifiedColumns[ПредписанияTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ПредписанияTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ПредписанияTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙ_ОРГАН)) {
            $modifiedColumns[':p' . $index++]  = 'Контролирующий_орган';
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ПОДРЯДЧИК)) {
            $modifiedColumns[':p' . $index++]  = 'Подрядчик';
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ДАТА_ВЫДАЧИ)) {
            $modifiedColumns[':p' . $index++]  = 'Дата_выдачи';
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ПЛАНОВАЯ_ДАТА_УСТРАНЕНИЯ)) {
            $modifiedColumns[':p' . $index++]  = 'Плановая_дата_устранения';
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯ_ДАТА_УСТРАНЕНИЯ)) {
            $modifiedColumns[':p' . $index++]  = 'Фактическая_дата_устранения';
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ТИП_ЗАМЕЧАНИЯ)) {
            $modifiedColumns[':p' . $index++]  = 'Тип_замечания';
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ПРОЕКТ)) {
            $modifiedColumns[':p' . $index++]  = 'Проект';
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ЗАВЕРШЕНИЕ)) {
            $modifiedColumns[':p' . $index++]  = 'Статус_заявки_завершение';
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ПРОСРОЧКА)) {
            $modifiedColumns[':p' . $index++]  = 'Статус_заявки_просрочка';
        }

        $sql = sprintf(
            'INSERT INTO Предписания (%s) VALUES (%s)',
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
                    case 'Контролирующий_орган':                        
                        $stmt->bindValue($identifier, $this->контролирующий_орган, PDO::PARAM_INT);
                        break;
                    case 'Подрядчик':                        
                        $stmt->bindValue($identifier, $this->подрядчик, PDO::PARAM_INT);
                        break;
                    case 'Дата_выдачи':                        
                        $stmt->bindValue($identifier, $this->дата_выдачи ? $this->дата_выдачи->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'Плановая_дата_устранения':                        
                        $stmt->bindValue($identifier, $this->плановая_дата_устранения ? $this->плановая_дата_устранения->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'Фактическая_дата_устранения':                        
                        $stmt->bindValue($identifier, $this->фактическая_дата_устранения ? $this->фактическая_дата_устранения->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'Тип_замечания':                        
                        $stmt->bindValue($identifier, $this->тип_замечания, PDO::PARAM_INT);
                        break;
                    case 'Проект':                        
                        $stmt->bindValue($identifier, $this->проект, PDO::PARAM_INT);
                        break;
                    case 'Статус_заявки_завершение':                        
                        $stmt->bindValue($identifier, $this->статус_заявки_завершение, PDO::PARAM_INT);
                        break;
                    case 'Статус_заявки_просрочка':                        
                        $stmt->bindValue($identifier, $this->статус_заявки_просрочка, PDO::PARAM_INT);
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
        $pos = ПредписанияTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getконтролирующийорган();
                break;
            case 2:
                return $this->getподрядчик();
                break;
            case 3:
                return $this->getдатавыдачи();
                break;
            case 4:
                return $this->getплановаядатаустранения();
                break;
            case 5:
                return $this->getфактическаядатаустранения();
                break;
            case 6:
                return $this->getтипзамечания();
                break;
            case 7:
                return $this->getпроект();
                break;
            case 8:
                return $this->getстатусзаявкизавершение();
                break;
            case 9:
                return $this->getстатусзаявкипросрочка();
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

        if (isset($alreadyDumpedObjects['Предписания'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Предписания'][$this->hashCode()] = true;
        $keys = ПредписанияTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getконтролирующийорган(),
            $keys[2] => $this->getподрядчик(),
            $keys[3] => $this->getдатавыдачи(),
            $keys[4] => $this->getплановаядатаустранения(),
            $keys[5] => $this->getфактическаядатаустранения(),
            $keys[6] => $this->getтипзамечания(),
            $keys[7] => $this->getпроект(),
            $keys[8] => $this->getстатусзаявкизавершение(),
            $keys[9] => $this->getстатусзаявкипросрочка(),
        );
        if ($result[$keys[3]] instanceof \DateTime) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }
        
        if ($result[$keys[4]] instanceof \DateTime) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }
        
        if ($result[$keys[5]] instanceof \DateTime) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
        }
        
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aКалендарьRelatedByдатавыдачи) {
                
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
        
                $result[$key] = $this->aКалендарьRelatedByдатавыдачи->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aКонтролирующиеОрганы) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�онтролирующиеОрганы';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Контролирующие_органы';
                        break;
                    default:
                        $key = 'КонтролирующиеОрганы';
                }
        
                $result[$key] = $this->aКонтролирующиеОрганы->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aКалендарьRelatedByплановаядатаустранения) {
                
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
        
                $result[$key] = $this->aКалендарьRelatedByплановаядатаустранения->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aПодрядчикиПредписания) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�одрядчикиПредписания';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Подрядчики_предписания';
                        break;
                    default:
                        $key = 'ПодрядчикиПредписания';
                }
        
                $result[$key] = $this->aПодрядчикиПредписания->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->aСтатусыЗаявкиЗавершение) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�татусыЗаявкиЗавершение';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Статусы_заявки_завершение';
                        break;
                    default:
                        $key = 'СтатусыЗаявкиЗавершение';
                }
        
                $result[$key] = $this->aСтатусыЗаявкиЗавершение->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aСтатусыЗаявкиПросрочка) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�татусыЗаявкиПросрочка';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Статусы_заявки_просрочка';
                        break;
                    default:
                        $key = 'СтатусыЗаявкиПросрочка';
                }
        
                $result[$key] = $this->aСтатусыЗаявкиПросрочка->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aТипыЗамечаний) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�ипыЗамечаний';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Типы_замечаний';
                        break;
                    default:
                        $key = 'ТипыЗамечаний';
                }
        
                $result[$key] = $this->aТипыЗамечаний->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aКалендарьRelatedByфактическаядатаустранения) {
                
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
        
                $result[$key] = $this->aКалендарьRelatedByфактическаядатаустранения->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Предписания
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ПредписанияTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Предписания
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setконтролирующийорган($value);
                break;
            case 2:
                $this->setподрядчик($value);
                break;
            case 3:
                $this->setдатавыдачи($value);
                break;
            case 4:
                $this->setплановаядатаустранения($value);
                break;
            case 5:
                $this->setфактическаядатаустранения($value);
                break;
            case 6:
                $this->setтипзамечания($value);
                break;
            case 7:
                $this->setпроект($value);
                break;
            case 8:
                $this->setстатусзаявкизавершение($value);
                break;
            case 9:
                $this->setстатусзаявкипросрочка($value);
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
        $keys = ПредписанияTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setконтролирующийорган($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setподрядчик($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setдатавыдачи($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setплановаядатаустранения($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setфактическаядатаустранения($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setтипзамечания($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setпроект($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setстатусзаявкизавершение($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setстатусзаявкипросрочка($arr[$keys[9]]);
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
     * @return $this|\Предписания The current object, for fluid interface
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
        $criteria = new Criteria(ПредписанияTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ПредписанияTableMap::COL_ID)) {
            $criteria->add(ПредписанияTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙ_ОРГАН)) {
            $criteria->add(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙ_ОРГАН, $this->контролирующий_орган);
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ПОДРЯДЧИК)) {
            $criteria->add(ПредписанияTableMap::COL_ПОДРЯДЧИК, $this->подрядчик);
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ДАТА_ВЫДАЧИ)) {
            $criteria->add(ПредписанияTableMap::COL_ДАТА_ВЫДАЧИ, $this->дата_выдачи);
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ПЛАНОВАЯ_ДАТА_УСТРАНЕНИЯ)) {
            $criteria->add(ПредписанияTableMap::COL_ПЛАНОВАЯ_ДАТА_УСТРАНЕНИЯ, $this->плановая_дата_устранения);
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯ_ДАТА_УСТРАНЕНИЯ)) {
            $criteria->add(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯ_ДАТА_УСТРАНЕНИЯ, $this->фактическая_дата_устранения);
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ТИП_ЗАМЕЧАНИЯ)) {
            $criteria->add(ПредписанияTableMap::COL_ТИП_ЗАМЕЧАНИЯ, $this->тип_замечания);
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_ПРОЕКТ)) {
            $criteria->add(ПредписанияTableMap::COL_ПРОЕКТ, $this->проект);
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ЗАВЕРШЕНИЕ)) {
            $criteria->add(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ЗАВЕРШЕНИЕ, $this->статус_заявки_завершение);
        }
        if ($this->isColumnModified(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ПРОСРОЧКА)) {
            $criteria->add(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ПРОСРОЧКА, $this->статус_заявки_просрочка);
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
        $criteria = ChildПредписанияQuery::create();
        $criteria->add(ПредписанияTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Предписания (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setконтролирующийорган($this->getконтролирующийорган());
        $copyObj->setподрядчик($this->getподрядчик());
        $copyObj->setдатавыдачи($this->getдатавыдачи());
        $copyObj->setплановаядатаустранения($this->getплановаядатаустранения());
        $copyObj->setфактическаядатаустранения($this->getфактическаядатаустранения());
        $copyObj->setтипзамечания($this->getтипзамечания());
        $copyObj->setпроект($this->getпроект());
        $copyObj->setстатусзаявкизавершение($this->getстатусзаявкизавершение());
        $copyObj->setстатусзаявкипросрочка($this->getстатусзаявкипросрочка());
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
     * @return \Предписания Clone of current object.
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
     * @return $this|\Предписания The current object (for fluent API support)
     * @throws PropelException
     */
    public function setКалендарьRelatedByдатавыдачи(ChildКалендарь $v = null)
    {
        if ($v === null) {
            $this->setдатавыдачи(NULL);
        } else {
            $this->setдатавыдачи($v->getдата());
        }

        $this->aКалендарьRelatedByдатавыдачи = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildКалендарь object, it will not be re-added.
        if ($v !== null) {
            $v->addПредписанияRelatedByдатавыдачи($this);
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
    public function getКалендарьRelatedByдатавыдачи(ConnectionInterface $con = null)
    {
        if ($this->aКалендарьRelatedByдатавыдачи === null && (($this->дата_выдачи !== "" && $this->дата_выдачи !== null))) {
            $this->aКалендарьRelatedByдатавыдачи = ChildКалендарьQuery::create()->findPk($this->дата_выдачи, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aКалендарьRelatedByдатавыдачи->addПредписанияsRelatedByдатавыдачи($this);
             */
        }

        return $this->aКалендарьRelatedByдатавыдачи;
    }

    /**
     * Declares an association between this object and a ChildКонтролирующиеОрганы object.
     *
     * @param  ChildКонтролирующиеОрганы $v
     * @return $this|\Предписания The current object (for fluent API support)
     * @throws PropelException
     */
    public function setКонтролирующиеОрганы(ChildКонтролирующиеОрганы $v = null)
    {
        if ($v === null) {
            $this->setконтролирующийорган(NULL);
        } else {
            $this->setконтролирующийорган($v->getId());
        }

        $this->aКонтролирующиеОрганы = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildКонтролирующиеОрганы object, it will not be re-added.
        if ($v !== null) {
            $v->addПредписания($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildКонтролирующиеОрганы object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildКонтролирующиеОрганы The associated ChildКонтролирующиеОрганы object.
     * @throws PropelException
     */
    public function getКонтролирующиеОрганы(ConnectionInterface $con = null)
    {
        if ($this->aКонтролирующиеОрганы === null && ($this->контролирующий_орган !== null)) {
            $this->aКонтролирующиеОрганы = ChildКонтролирующиеОрганыQuery::create()->findPk($this->контролирующий_орган, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aКонтролирующиеОрганы->addПредписанияs($this);
             */
        }

        return $this->aКонтролирующиеОрганы;
    }

    /**
     * Declares an association between this object and a ChildКалендарь object.
     *
     * @param  ChildКалендарь $v
     * @return $this|\Предписания The current object (for fluent API support)
     * @throws PropelException
     */
    public function setКалендарьRelatedByплановаядатаустранения(ChildКалендарь $v = null)
    {
        if ($v === null) {
            $this->setплановаядатаустранения(NULL);
        } else {
            $this->setплановаядатаустранения($v->getдата());
        }

        $this->aКалендарьRelatedByплановаядатаустранения = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildКалендарь object, it will not be re-added.
        if ($v !== null) {
            $v->addПредписанияRelatedByплановаядатаустранения($this);
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
    public function getКалендарьRelatedByплановаядатаустранения(ConnectionInterface $con = null)
    {
        if ($this->aКалендарьRelatedByплановаядатаустранения === null && (($this->плановая_дата_устранения !== "" && $this->плановая_дата_устранения !== null))) {
            $this->aКалендарьRelatedByплановаядатаустранения = ChildКалендарьQuery::create()->findPk($this->плановая_дата_устранения, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aКалендарьRelatedByплановаядатаустранения->addПредписанияsRelatedByплановаядатаустранения($this);
             */
        }

        return $this->aКалендарьRelatedByплановаядатаустранения;
    }

    /**
     * Declares an association between this object and a ChildПодрядчикиПредписания object.
     *
     * @param  ChildПодрядчикиПредписания $v
     * @return $this|\Предписания The current object (for fluent API support)
     * @throws PropelException
     */
    public function setПодрядчикиПредписания(ChildПодрядчикиПредписания $v = null)
    {
        if ($v === null) {
            $this->setподрядчик(NULL);
        } else {
            $this->setподрядчик($v->getId());
        }

        $this->aПодрядчикиПредписания = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildПодрядчикиПредписания object, it will not be re-added.
        if ($v !== null) {
            $v->addПредписания($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildПодрядчикиПредписания object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildПодрядчикиПредписания The associated ChildПодрядчикиПредписания object.
     * @throws PropelException
     */
    public function getПодрядчикиПредписания(ConnectionInterface $con = null)
    {
        if ($this->aПодрядчикиПредписания === null && ($this->подрядчик !== null)) {
            $this->aПодрядчикиПредписания = ChildПодрядчикиПредписанияQuery::create()->findPk($this->подрядчик, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aПодрядчикиПредписания->addПредписанияs($this);
             */
        }

        return $this->aПодрядчикиПредписания;
    }

    /**
     * Declares an association between this object and a ChildПроекты object.
     *
     * @param  ChildПроекты $v
     * @return $this|\Предписания The current object (for fluent API support)
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
            $v->addПредписания($this);
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
                $this->aПроекты->addПредписанияs($this);
             */
        }

        return $this->aПроекты;
    }

    /**
     * Declares an association between this object and a ChildСтатусыЗаявкиЗавершение object.
     *
     * @param  ChildСтатусыЗаявкиЗавершение $v
     * @return $this|\Предписания The current object (for fluent API support)
     * @throws PropelException
     */
    public function setСтатусыЗаявкиЗавершение(ChildСтатусыЗаявкиЗавершение $v = null)
    {
        if ($v === null) {
            $this->setстатусзаявкизавершение(NULL);
        } else {
            $this->setстатусзаявкизавершение($v->getId());
        }

        $this->aСтатусыЗаявкиЗавершение = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildСтатусыЗаявкиЗавершение object, it will not be re-added.
        if ($v !== null) {
            $v->addПредписания($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildСтатусыЗаявкиЗавершение object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildСтатусыЗаявкиЗавершение The associated ChildСтатусыЗаявкиЗавершение object.
     * @throws PropelException
     */
    public function getСтатусыЗаявкиЗавершение(ConnectionInterface $con = null)
    {
        if ($this->aСтатусыЗаявкиЗавершение === null && ($this->статус_заявки_завершение !== null)) {
            $this->aСтатусыЗаявкиЗавершение = ChildСтатусыЗаявкиЗавершениеQuery::create()->findPk($this->статус_заявки_завершение, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aСтатусыЗаявкиЗавершение->addПредписанияs($this);
             */
        }

        return $this->aСтатусыЗаявкиЗавершение;
    }

    /**
     * Declares an association between this object and a ChildСтатусыЗаявкиПросрочка object.
     *
     * @param  ChildСтатусыЗаявкиПросрочка $v
     * @return $this|\Предписания The current object (for fluent API support)
     * @throws PropelException
     */
    public function setСтатусыЗаявкиПросрочка(ChildСтатусыЗаявкиПросрочка $v = null)
    {
        if ($v === null) {
            $this->setстатусзаявкипросрочка(NULL);
        } else {
            $this->setстатусзаявкипросрочка($v->getId());
        }

        $this->aСтатусыЗаявкиПросрочка = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildСтатусыЗаявкиПросрочка object, it will not be re-added.
        if ($v !== null) {
            $v->addПредписания($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildСтатусыЗаявкиПросрочка object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildСтатусыЗаявкиПросрочка The associated ChildСтатусыЗаявкиПросрочка object.
     * @throws PropelException
     */
    public function getСтатусыЗаявкиПросрочка(ConnectionInterface $con = null)
    {
        if ($this->aСтатусыЗаявкиПросрочка === null && ($this->статус_заявки_просрочка !== null)) {
            $this->aСтатусыЗаявкиПросрочка = ChildСтатусыЗаявкиПросрочкаQuery::create()->findPk($this->статус_заявки_просрочка, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aСтатусыЗаявкиПросрочка->addПредписанияs($this);
             */
        }

        return $this->aСтатусыЗаявкиПросрочка;
    }

    /**
     * Declares an association between this object and a ChildТипыЗамечаний object.
     *
     * @param  ChildТипыЗамечаний $v
     * @return $this|\Предписания The current object (for fluent API support)
     * @throws PropelException
     */
    public function setТипыЗамечаний(ChildТипыЗамечаний $v = null)
    {
        if ($v === null) {
            $this->setтипзамечания(NULL);
        } else {
            $this->setтипзамечания($v->getId());
        }

        $this->aТипыЗамечаний = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildТипыЗамечаний object, it will not be re-added.
        if ($v !== null) {
            $v->addПредписания($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildТипыЗамечаний object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildТипыЗамечаний The associated ChildТипыЗамечаний object.
     * @throws PropelException
     */
    public function getТипыЗамечаний(ConnectionInterface $con = null)
    {
        if ($this->aТипыЗамечаний === null && ($this->тип_замечания !== null)) {
            $this->aТипыЗамечаний = ChildТипыЗамечанийQuery::create()->findPk($this->тип_замечания, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aТипыЗамечаний->addПредписанияs($this);
             */
        }

        return $this->aТипыЗамечаний;
    }

    /**
     * Declares an association between this object and a ChildКалендарь object.
     *
     * @param  ChildКалендарь $v
     * @return $this|\Предписания The current object (for fluent API support)
     * @throws PropelException
     */
    public function setКалендарьRelatedByфактическаядатаустранения(ChildКалендарь $v = null)
    {
        if ($v === null) {
            $this->setфактическаядатаустранения(NULL);
        } else {
            $this->setфактическаядатаустранения($v->getдата());
        }

        $this->aКалендарьRelatedByфактическаядатаустранения = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildКалендарь object, it will not be re-added.
        if ($v !== null) {
            $v->addПредписанияRelatedByфактическаядатаустранения($this);
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
    public function getКалендарьRelatedByфактическаядатаустранения(ConnectionInterface $con = null)
    {
        if ($this->aКалендарьRelatedByфактическаядатаустранения === null && (($this->фактическая_дата_устранения !== "" && $this->фактическая_дата_устранения !== null))) {
            $this->aКалендарьRelatedByфактическаядатаустранения = ChildКалендарьQuery::create()->findPk($this->фактическая_дата_устранения, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aКалендарьRelatedByфактическаядатаустранения->addПредписанияsRelatedByфактическаядатаустранения($this);
             */
        }

        return $this->aКалендарьRelatedByфактическаядатаустранения;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aКалендарьRelatedByдатавыдачи) {
            $this->aКалендарьRelatedByдатавыдачи->removeПредписанияRelatedByдатавыдачи($this);
        }
        if (null !== $this->aКонтролирующиеОрганы) {
            $this->aКонтролирующиеОрганы->removeПредписания($this);
        }
        if (null !== $this->aКалендарьRelatedByплановаядатаустранения) {
            $this->aКалендарьRelatedByплановаядатаустранения->removeПредписанияRelatedByплановаядатаустранения($this);
        }
        if (null !== $this->aПодрядчикиПредписания) {
            $this->aПодрядчикиПредписания->removeПредписания($this);
        }
        if (null !== $this->aПроекты) {
            $this->aПроекты->removeПредписания($this);
        }
        if (null !== $this->aСтатусыЗаявкиЗавершение) {
            $this->aСтатусыЗаявкиЗавершение->removeПредписания($this);
        }
        if (null !== $this->aСтатусыЗаявкиПросрочка) {
            $this->aСтатусыЗаявкиПросрочка->removeПредписания($this);
        }
        if (null !== $this->aТипыЗамечаний) {
            $this->aТипыЗамечаний->removeПредписания($this);
        }
        if (null !== $this->aКалендарьRelatedByфактическаядатаустранения) {
            $this->aКалендарьRelatedByфактическаядатаустранения->removeПредписанияRelatedByфактическаядатаустранения($this);
        }
        $this->id = null;
        $this->контролирующий_орган = null;
        $this->подрядчик = null;
        $this->дата_выдачи = null;
        $this->плановая_дата_устранения = null;
        $this->фактическая_дата_устранения = null;
        $this->тип_замечания = null;
        $this->проект = null;
        $this->статус_заявки_завершение = null;
        $this->статус_заявки_просрочка = null;
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

        $this->aКалендарьRelatedByдатавыдачи = null;
        $this->aКонтролирующиеОрганы = null;
        $this->aКалендарьRelatedByплановаядатаустранения = null;
        $this->aПодрядчикиПредписания = null;
        $this->aПроекты = null;
        $this->aСтатусыЗаявкиЗавершение = null;
        $this->aСтатусыЗаявкиПросрочка = null;
        $this->aТипыЗамечаний = null;
        $this->aКалендарьRelatedByфактическаядатаустранения = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ПредписанияTableMap::DEFAULT_STRING_FORMAT);
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
