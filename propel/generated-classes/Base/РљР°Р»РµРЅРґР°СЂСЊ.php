<?php

namespace Base;

use \Календарь as ChildКалендарь;
use \КалендарьQuery as ChildКалендарьQuery;
use \Предписания as ChildПредписания;
use \ПредписанияQuery as ChildПредписанияQuery;
use \выработка as Childвыработка;
use \выработкаQuery as ChildвыработкаQuery;
use \года as Childгода;
use \годаQuery as ChildгодаQuery;
use \датыобновленийдашбордов as Childдатыобновленийдашбордов;
use \датыобновленийдашбордовQuery as ChildдатыобновленийдашбордовQuery;
use \днинедели as Childднинедели;
use \днинеделиQuery as ChildднинеделиQuery;
use \месяца as Childмесяца;
use \месяцаQuery as ChildмесяцаQuery;
use \мобилизация as Childмобилизация;
use \мобилизацияQuery as ChildмобилизацияQuery;
use \мобилизацияпомесяцам as Childмобилизацияпомесяцам;
use \мобилизацияпомесяцамQuery as ChildмобилизацияпомесяцамQuery;
use \мтр as Childмтр;
use \мтрQuery as ChildмтрQuery;
use \физическиеобъёмы as Childфизическиеобъёмы;
use \физическиеобъёмыQuery as ChildфизическиеобъёмыQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\КалендарьTableMap;
use Map\ПредписанияTableMap;
use Map\выработкаTableMap;
use Map\датыобновленийдашбордовTableMap;
use Map\мобилизацияTableMap;
use Map\мобилизацияпомесяцамTableMap;
use Map\мтрTableMap;
use Map\физическиеобъёмыTableMap;
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
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'Календарь' table.
 *
 * 
 *
* @package    propel.generator..Base
*/
abstract class Календарь implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\КалендарьTableMap';


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
     * The value for the дата field.
     * 
     * @var        \DateTime
     */
    protected $дата;

    /**
     * The value for the год field.
     * 
     * @var        int
     */
    protected $год;

    /**
     * The value for the полугодие field.
     * 
     * @var        int
     */
    protected $полугодие;

    /**
     * The value for the квартал field.
     * 
     * @var        int
     */
    protected $квартал;

    /**
     * The value for the номер_месяца field.
     * 
     * @var        int
     */
    protected $номер_месяца;

    /**
     * The value for the месяц field.
     * 
     * @var        string
     */
    protected $месяц;

    /**
     * The value for the день field.
     * 
     * @var        int
     */
    protected $день;

    /**
     * The value for the номер_недели field.
     * 
     * @var        int
     */
    protected $номер_недели;

    /**
     * The value for the день_недели field.
     * 
     * @var        int
     */
    protected $день_недели;

    /**
     * The value for the день_в_году field.
     * 
     * @var        int
     */
    protected $день_в_году;

    /**
     * @var        Childгода
     */
    protected $aгода;

    /**
     * @var        Childднинедели
     */
    protected $aднинедели;

    /**
     * @var        Childмесяца
     */
    protected $aмесяца;

    /**
     * @var        ObjectCollection|Childвыработка[] Collection to store aggregation of Childвыработка objects.
     */
    protected $collвыработкаs;
    protected $collвыработкаsPartial;

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
    protected $collПредписанияsRelatedByдатавыдачи;
    protected $collПредписанияsRelatedByдатавыдачиPartial;

    /**
     * @var        ObjectCollection|ChildПредписания[] Collection to store aggregation of ChildПредписания objects.
     */
    protected $collПредписанияsRelatedByплановаядатаустранения;
    protected $collПредписанияsRelatedByплановаядатаустраненияPartial;

    /**
     * @var        ObjectCollection|ChildПредписания[] Collection to store aggregation of ChildПредписания objects.
     */
    protected $collПредписанияsRelatedByфактическаядатаустранения;
    protected $collПредписанияsRelatedByфактическаядатаустраненияPartial;

    /**
     * @var        ObjectCollection|Childфизическиеобъёмы[] Collection to store aggregation of Childфизическиеобъёмы objects.
     */
    protected $collфизическиеобъёмыs;
    protected $collфизическиеобъёмыsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|Childвыработка[]
     */
    protected $�ыработкаsScheduledForDeletion = null;

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
    protected $�редписанияsRelatedByдатавыдачиScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildПредписания[]
     */
    protected $�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildПредписания[]
     */
    protected $�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|Childфизическиеобъёмы[]
     */
    protected $�изическиеобъёмыsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Календарь object.
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
     * Compares this with another <code>Календарь</code> instance.  If
     * <code>obj</code> is an instance of <code>Календарь</code>, delegates to
     * <code>equals(Календарь)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Календарь The current object, for fluid interface
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
     * Get the [год] column value.
     * 
     * @return int
     */
    public function getгод()
    {
        return $this->год;
    }

    /**
     * Get the [полугодие] column value.
     * 
     * @return int
     */
    public function getполугодие()
    {
        return $this->полугодие;
    }

    /**
     * Get the [квартал] column value.
     * 
     * @return int
     */
    public function getквартал()
    {
        return $this->квартал;
    }

    /**
     * Get the [номер_месяца] column value.
     * 
     * @return int
     */
    public function getномермесяца()
    {
        return $this->номер_месяца;
    }

    /**
     * Get the [месяц] column value.
     * 
     * @return string
     */
    public function getмесяц()
    {
        return $this->месяц;
    }

    /**
     * Get the [день] column value.
     * 
     * @return int
     */
    public function getдень()
    {
        return $this->день;
    }

    /**
     * Get the [номер_недели] column value.
     * 
     * @return int
     */
    public function getномернедели()
    {
        return $this->номер_недели;
    }

    /**
     * Get the [день_недели] column value.
     * 
     * @return int
     */
    public function getденьнедели()
    {
        return $this->день_недели;
    }

    /**
     * Get the [день_в_году] column value.
     * 
     * @return int
     */
    public function getденьвгоду()
    {
        return $this->день_в_году;
    }

    /**
     * Sets the value of [дата] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setдата($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->дата !== null || $dt !== null) {
            if ($this->дата === null || $dt === null || $dt->format("Y-m-d") !== $this->дата->format("Y-m-d")) {
                $this->дата = $dt === null ? null : clone $dt;
                $this->modifiedColumns[КалендарьTableMap::COL_ДАТА] = true;
            }
        } // if either are not null

        return $this;
    } // setдата()

    /**
     * Set the value of [год] column.
     * 
     * @param int $v new value
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setгод($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->год !== $v) {
            $this->год = $v;
            $this->modifiedColumns[КалендарьTableMap::COL_ГОД] = true;
        }

        if ($this->aгода !== null && $this->aгода->getId() !== $v) {
            $this->aгода = null;
        }

        return $this;
    } // setгод()

    /**
     * Set the value of [полугодие] column.
     * 
     * @param int $v new value
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setполугодие($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->полугодие !== $v) {
            $this->полугодие = $v;
            $this->modifiedColumns[КалендарьTableMap::COL_ПОЛУГОДИЕ] = true;
        }

        return $this;
    } // setполугодие()

    /**
     * Set the value of [квартал] column.
     * 
     * @param int $v new value
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setквартал($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->квартал !== $v) {
            $this->квартал = $v;
            $this->modifiedColumns[КалендарьTableMap::COL_КВАРТАЛ] = true;
        }

        return $this;
    } // setквартал()

    /**
     * Set the value of [номер_месяца] column.
     * 
     * @param int $v new value
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setномермесяца($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->номер_месяца !== $v) {
            $this->номер_месяца = $v;
            $this->modifiedColumns[КалендарьTableMap::COL_НОМЕР_МЕСЯЦА] = true;
        }

        if ($this->aмесяца !== null && $this->aмесяца->getId() !== $v) {
            $this->aмесяца = null;
        }

        return $this;
    } // setномермесяца()

    /**
     * Set the value of [месяц] column.
     * 
     * @param string $v new value
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setмесяц($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->месяц !== $v) {
            $this->месяц = $v;
            $this->modifiedColumns[КалендарьTableMap::COL_МЕСЯЦ] = true;
        }

        return $this;
    } // setмесяц()

    /**
     * Set the value of [день] column.
     * 
     * @param int $v new value
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setдень($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->день !== $v) {
            $this->день = $v;
            $this->modifiedColumns[КалендарьTableMap::COL_ДЕНЬ] = true;
        }

        return $this;
    } // setдень()

    /**
     * Set the value of [номер_недели] column.
     * 
     * @param int $v new value
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setномернедели($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->номер_недели !== $v) {
            $this->номер_недели = $v;
            $this->modifiedColumns[КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ] = true;
        }

        return $this;
    } // setномернедели()

    /**
     * Set the value of [день_недели] column.
     * 
     * @param int $v new value
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setденьнедели($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->день_недели !== $v) {
            $this->день_недели = $v;
            $this->modifiedColumns[КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ] = true;
        }

        if ($this->aднинедели !== null && $this->aднинедели->getId() !== $v) {
            $this->aднинедели = null;
        }

        return $this;
    } // setденьнедели()

    /**
     * Set the value of [день_в_году] column.
     * 
     * @param int $v new value
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function setденьвгоду($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->день_в_году !== $v) {
            $this->день_в_году = $v;
            $this->modifiedColumns[КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ] = true;
        }

        return $this;
    } // setденьвгоду()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : КалендарьTableMap::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->дата = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : КалендарьTableMap::translateFieldName('год', TableMap::TYPE_PHPNAME, $indexType)];
            $this->год = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : КалендарьTableMap::translateFieldName('полугодие', TableMap::TYPE_PHPNAME, $indexType)];
            $this->полугодие = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : КалендарьTableMap::translateFieldName('квартал', TableMap::TYPE_PHPNAME, $indexType)];
            $this->квартал = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : КалендарьTableMap::translateFieldName('номермесяца', TableMap::TYPE_PHPNAME, $indexType)];
            $this->номер_месяца = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : КалендарьTableMap::translateFieldName('месяц', TableMap::TYPE_PHPNAME, $indexType)];
            $this->месяц = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : КалендарьTableMap::translateFieldName('день', TableMap::TYPE_PHPNAME, $indexType)];
            $this->день = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : КалендарьTableMap::translateFieldName('номернедели', TableMap::TYPE_PHPNAME, $indexType)];
            $this->номер_недели = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : КалендарьTableMap::translateFieldName('деньнедели', TableMap::TYPE_PHPNAME, $indexType)];
            $this->день_недели = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : КалендарьTableMap::translateFieldName('деньвгоду', TableMap::TYPE_PHPNAME, $indexType)];
            $this->день_в_году = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = КалендарьTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Календарь'), 0, $e);
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
        if ($this->aгода !== null && $this->год !== $this->aгода->getId()) {
            $this->aгода = null;
        }
        if ($this->aмесяца !== null && $this->номер_месяца !== $this->aмесяца->getId()) {
            $this->aмесяца = null;
        }
        if ($this->aднинедели !== null && $this->день_недели !== $this->aднинедели->getId()) {
            $this->aднинедели = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(КалендарьTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildКалендарьQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aгода = null;
            $this->aднинедели = null;
            $this->aмесяца = null;
            $this->collвыработкаs = null;

            $this->collдатыобновленийдашбордовs = null;

            $this->collмтрs = null;

            $this->collмобилизацияs = null;

            $this->collмобилизацияпомесяцамs = null;

            $this->collПредписанияsRelatedByдатавыдачи = null;

            $this->collПредписанияsRelatedByплановаядатаустранения = null;

            $this->collПредписанияsRelatedByфактическаядатаустранения = null;

            $this->collфизическиеобъёмыs = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Календарь::setDeleted()
     * @see Календарь::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(КалендарьTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildКалендарьQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(КалендарьTableMap::DATABASE_NAME);
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
                КалендарьTableMap::addInstanceToPool($this);
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

            if ($this->aгода !== null) {
                if ($this->aгода->isModified() || $this->aгода->isNew()) {
                    $affectedRows += $this->aгода->save($con);
                }
                $this->setгода($this->aгода);
            }

            if ($this->aднинедели !== null) {
                if ($this->aднинедели->isModified() || $this->aднинедели->isNew()) {
                    $affectedRows += $this->aднинедели->save($con);
                }
                $this->setднинедели($this->aднинедели);
            }

            if ($this->aмесяца !== null) {
                if ($this->aмесяца->isModified() || $this->aмесяца->isNew()) {
                    $affectedRows += $this->aмесяца->save($con);
                }
                $this->setмесяца($this->aмесяца);
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

            if ($this->�ыработкаsScheduledForDeletion !== null) {
                if (!$this->�ыработкаsScheduledForDeletion->isEmpty()) {
                    \выработкаQuery::create()
                        ->filterByPrimaryKeys($this->�ыработкаsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->�ыработкаsScheduledForDeletion = null;
                }
            }

            if ($this->collвыработкаs !== null) {
                foreach ($this->collвыработкаs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�атыобновленийдашбордовsScheduledForDeletion !== null) {
                if (!$this->�атыобновленийдашбордовsScheduledForDeletion->isEmpty()) {
                    \датыобновленийдашбордовQuery::create()
                        ->filterByPrimaryKeys($this->�атыобновленийдашбордовsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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
                    \мтрQuery::create()
                        ->filterByPrimaryKeys($this->�трsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->�редписанияsRelatedByдатавыдачиScheduledForDeletion !== null) {
                if (!$this->�редписанияsRelatedByдатавыдачиScheduledForDeletion->isEmpty()) {
                    \ПредписанияQuery::create()
                        ->filterByPrimaryKeys($this->�редписанияsRelatedByдатавыдачиScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->�редписанияsRelatedByдатавыдачиScheduledForDeletion = null;
                }
            }

            if ($this->collПредписанияsRelatedByдатавыдачи !== null) {
                foreach ($this->collПредписанияsRelatedByдатавыдачи as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion !== null) {
                if (!$this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion->isEmpty()) {
                    \ПредписанияQuery::create()
                        ->filterByPrimaryKeys($this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion = null;
                }
            }

            if ($this->collПредписанияsRelatedByплановаядатаустранения !== null) {
                foreach ($this->collПредписанияsRelatedByплановаядатаустранения as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion !== null) {
                if (!$this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion->isEmpty()) {
                    foreach ($this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion as $�редписанияRelatedByфактическаядатаустранения) {
                        // need to save related object because we set the relation to null
                        $�редписанияRelatedByфактическаядатаустранения->save($con);
                    }
                    $this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion = null;
                }
            }

            if ($this->collПредписанияsRelatedByфактическаядатаустранения !== null) {
                foreach ($this->collПредписанияsRelatedByфактическаядатаустранения as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->�изическиеобъёмыsScheduledForDeletion !== null) {
                if (!$this->�изическиеобъёмыsScheduledForDeletion->isEmpty()) {
                    \физическиеобъёмыQuery::create()
                        ->filterByPrimaryKeys($this->�изическиеобъёмыsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->�изическиеобъёмыsScheduledForDeletion = null;
                }
            }

            if ($this->collфизическиеобъёмыs !== null) {
                foreach ($this->collфизическиеобъёмыs as $referrerFK) {
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(КалендарьTableMap::COL_ДАТА)) {
            $modifiedColumns[':p' . $index++]  = 'Дата';
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ГОД)) {
            $modifiedColumns[':p' . $index++]  = 'Год';
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ПОЛУГОДИЕ)) {
            $modifiedColumns[':p' . $index++]  = 'Полугодие';
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_КВАРТАЛ)) {
            $modifiedColumns[':p' . $index++]  = 'Квартал';
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_НОМЕР_МЕСЯЦА)) {
            $modifiedColumns[':p' . $index++]  = 'Номер_месяца';
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_МЕСЯЦ)) {
            $modifiedColumns[':p' . $index++]  = 'Месяц';
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ДЕНЬ)) {
            $modifiedColumns[':p' . $index++]  = 'День';
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ)) {
            $modifiedColumns[':p' . $index++]  = 'Номер_недели';
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ)) {
            $modifiedColumns[':p' . $index++]  = 'День_недели';
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ)) {
            $modifiedColumns[':p' . $index++]  = 'День_в_году';
        }

        $sql = sprintf(
            'INSERT INTO Календарь (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'Дата':                        
                        $stmt->bindValue($identifier, $this->дата ? $this->дата->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'Год':                        
                        $stmt->bindValue($identifier, $this->год, PDO::PARAM_INT);
                        break;
                    case 'Полугодие':                        
                        $stmt->bindValue($identifier, $this->полугодие, PDO::PARAM_INT);
                        break;
                    case 'Квартал':                        
                        $stmt->bindValue($identifier, $this->квартал, PDO::PARAM_INT);
                        break;
                    case 'Номер_месяца':                        
                        $stmt->bindValue($identifier, $this->номер_месяца, PDO::PARAM_INT);
                        break;
                    case 'Месяц':                        
                        $stmt->bindValue($identifier, $this->месяц, PDO::PARAM_STR);
                        break;
                    case 'День':                        
                        $stmt->bindValue($identifier, $this->день, PDO::PARAM_INT);
                        break;
                    case 'Номер_недели':                        
                        $stmt->bindValue($identifier, $this->номер_недели, PDO::PARAM_INT);
                        break;
                    case 'День_недели':                        
                        $stmt->bindValue($identifier, $this->день_недели, PDO::PARAM_INT);
                        break;
                    case 'День_в_году':                        
                        $stmt->bindValue($identifier, $this->день_в_году, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
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
        $pos = КалендарьTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getдата();
                break;
            case 1:
                return $this->getгод();
                break;
            case 2:
                return $this->getполугодие();
                break;
            case 3:
                return $this->getквартал();
                break;
            case 4:
                return $this->getномермесяца();
                break;
            case 5:
                return $this->getмесяц();
                break;
            case 6:
                return $this->getдень();
                break;
            case 7:
                return $this->getномернедели();
                break;
            case 8:
                return $this->getденьнедели();
                break;
            case 9:
                return $this->getденьвгоду();
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

        if (isset($alreadyDumpedObjects['Календарь'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Календарь'][$this->hashCode()] = true;
        $keys = КалендарьTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getдата(),
            $keys[1] => $this->getгод(),
            $keys[2] => $this->getполугодие(),
            $keys[3] => $this->getквартал(),
            $keys[4] => $this->getномермесяца(),
            $keys[5] => $this->getмесяц(),
            $keys[6] => $this->getдень(),
            $keys[7] => $this->getномернедели(),
            $keys[8] => $this->getденьнедели(),
            $keys[9] => $this->getденьвгоду(),
        );
        if ($result[$keys[0]] instanceof \DateTime) {
            $result[$keys[0]] = $result[$keys[0]]->format('c');
        }
        
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
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
            if (null !== $this->aднинедели) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�нинедели';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Дни_недели';
                        break;
                    default:
                        $key = 'днинедели';
                }
        
                $result[$key] = $this->aднинедели->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collвыработкаs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�ыработкаs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Выработкаs';
                        break;
                    default:
                        $key = 'выработкаs';
                }
        
                $result[$key] = $this->collвыработкаs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
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
            if (null !== $this->collПредписанияsRelatedByдатавыдачи) {
                
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
        
                $result[$key] = $this->collПредписанияsRelatedByдатавыдачи->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collПредписанияsRelatedByплановаядатаустранения) {
                
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
        
                $result[$key] = $this->collПредписанияsRelatedByплановаядатаустранения->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collПредписанияsRelatedByфактическаядатаустранения) {
                
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
        
                $result[$key] = $this->collПредписанияsRelatedByфактическаядатаустранения->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collфизическиеобъёмыs) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = '�изическиеобъёмыs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Физические_объёмыs';
                        break;
                    default:
                        $key = 'физическиеобъёмыs';
                }
        
                $result[$key] = $this->collфизическиеобъёмыs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Календарь
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = КалендарьTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Календарь
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setдата($value);
                break;
            case 1:
                $this->setгод($value);
                break;
            case 2:
                $this->setполугодие($value);
                break;
            case 3:
                $this->setквартал($value);
                break;
            case 4:
                $this->setномермесяца($value);
                break;
            case 5:
                $this->setмесяц($value);
                break;
            case 6:
                $this->setдень($value);
                break;
            case 7:
                $this->setномернедели($value);
                break;
            case 8:
                $this->setденьнедели($value);
                break;
            case 9:
                $this->setденьвгоду($value);
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
        $keys = КалендарьTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setдата($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setгод($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setполугодие($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setквартал($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setномермесяца($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setмесяц($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setдень($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setномернедели($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setденьнедели($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setденьвгоду($arr[$keys[9]]);
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
     * @return $this|\Календарь The current object, for fluid interface
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
        $criteria = new Criteria(КалендарьTableMap::DATABASE_NAME);

        if ($this->isColumnModified(КалендарьTableMap::COL_ДАТА)) {
            $criteria->add(КалендарьTableMap::COL_ДАТА, $this->дата);
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ГОД)) {
            $criteria->add(КалендарьTableMap::COL_ГОД, $this->год);
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ПОЛУГОДИЕ)) {
            $criteria->add(КалендарьTableMap::COL_ПОЛУГОДИЕ, $this->полугодие);
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_КВАРТАЛ)) {
            $criteria->add(КалендарьTableMap::COL_КВАРТАЛ, $this->квартал);
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_НОМЕР_МЕСЯЦА)) {
            $criteria->add(КалендарьTableMap::COL_НОМЕР_МЕСЯЦА, $this->номер_месяца);
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_МЕСЯЦ)) {
            $criteria->add(КалендарьTableMap::COL_МЕСЯЦ, $this->месяц);
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ДЕНЬ)) {
            $criteria->add(КалендарьTableMap::COL_ДЕНЬ, $this->день);
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ)) {
            $criteria->add(КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ, $this->номер_недели);
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ)) {
            $criteria->add(КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ, $this->день_недели);
        }
        if ($this->isColumnModified(КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ)) {
            $criteria->add(КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ, $this->день_в_году);
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
        $criteria = ChildКалендарьQuery::create();
        $criteria->add(КалендарьTableMap::COL_ДАТА, $this->дата);

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
        $validPk = null !== $this->getдата();

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
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getдата();
    }

    /**
     * Generic method to set the primary key (дата column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setдата($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getдата();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Календарь (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setдата($this->getдата());
        $copyObj->setгод($this->getгод());
        $copyObj->setполугодие($this->getполугодие());
        $copyObj->setквартал($this->getквартал());
        $copyObj->setномермесяца($this->getномермесяца());
        $copyObj->setмесяц($this->getмесяц());
        $copyObj->setдень($this->getдень());
        $copyObj->setномернедели($this->getномернедели());
        $copyObj->setденьнедели($this->getденьнедели());
        $copyObj->setденьвгоду($this->getденьвгоду());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getвыработкаs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addвыработка($relObj->copy($deepCopy));
                }
            }

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

            foreach ($this->getПредписанияsRelatedByдатавыдачи() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addПредписанияRelatedByдатавыдачи($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getПредписанияsRelatedByплановаядатаустранения() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addПредписанияRelatedByплановаядатаустранения($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getПредписанияsRelatedByфактическаядатаустранения() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addПредписанияRelatedByфактическаядатаустранения($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getфизическиеобъёмыs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addфизическиеобъёмы($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \Календарь Clone of current object.
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
     * Declares an association between this object and a Childгода object.
     *
     * @param  Childгода $v
     * @return $this|\Календарь The current object (for fluent API support)
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
            $v->addКалендарь($this);
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
                $this->aгода->addКалендарьs($this);
             */
        }

        return $this->aгода;
    }

    /**
     * Declares an association between this object and a Childднинедели object.
     *
     * @param  Childднинедели $v
     * @return $this|\Календарь The current object (for fluent API support)
     * @throws PropelException
     */
    public function setднинедели(Childднинедели $v = null)
    {
        if ($v === null) {
            $this->setденьнедели(NULL);
        } else {
            $this->setденьнедели($v->getId());
        }

        $this->aднинедели = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childднинедели object, it will not be re-added.
        if ($v !== null) {
            $v->addКалендарь($this);
        }


        return $this;
    }


    /**
     * Get the associated Childднинедели object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return Childднинедели The associated Childднинедели object.
     * @throws PropelException
     */
    public function getднинедели(ConnectionInterface $con = null)
    {
        if ($this->aднинедели === null && ($this->день_недели !== null)) {
            $this->aднинедели = ChildднинеделиQuery::create()->findPk($this->день_недели, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aднинедели->addКалендарьs($this);
             */
        }

        return $this->aднинедели;
    }

    /**
     * Declares an association between this object and a Childмесяца object.
     *
     * @param  Childмесяца $v
     * @return $this|\Календарь The current object (for fluent API support)
     * @throws PropelException
     */
    public function setмесяца(Childмесяца $v = null)
    {
        if ($v === null) {
            $this->setномермесяца(NULL);
        } else {
            $this->setномермесяца($v->getId());
        }

        $this->aмесяца = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Childмесяца object, it will not be re-added.
        if ($v !== null) {
            $v->addКалендарь($this);
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
        if ($this->aмесяца === null && ($this->номер_месяца !== null)) {
            $this->aмесяца = ChildмесяцаQuery::create()->findPk($this->номер_месяца, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aмесяца->addКалендарьs($this);
             */
        }

        return $this->aмесяца;
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
        if ('выработка' == $relationName) {
            return $this->initвыработкаs();
        }
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
        if ('ПредписанияRelatedByдатавыдачи' == $relationName) {
            return $this->initПредписанияsRelatedByдатавыдачи();
        }
        if ('ПредписанияRelatedByплановаядатаустранения' == $relationName) {
            return $this->initПредписанияsRelatedByплановаядатаустранения();
        }
        if ('ПредписанияRelatedByфактическаядатаустранения' == $relationName) {
            return $this->initПредписанияsRelatedByфактическаядатаустранения();
        }
        if ('физическиеобъёмы' == $relationName) {
            return $this->initфизическиеобъёмыs();
        }
    }

    /**
     * Clears out the collвыработкаs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addвыработкаs()
     */
    public function clearвыработкаs()
    {
        $this->collвыработкаs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collвыработкаs collection loaded partially.
     */
    public function resetPartialвыработкаs($v = true)
    {
        $this->collвыработкаsPartial = $v;
    }

    /**
     * Initializes the collвыработкаs collection.
     *
     * By default this just sets the collвыработкаs collection to an empty array (like clearcollвыработкаs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initвыработкаs($overrideExisting = true)
    {
        if (null !== $this->collвыработкаs && !$overrideExisting) {
            return;
        }

        $collectionClassName = выработкаTableMap::getTableMap()->getCollectionClassName();

        $this->collвыработкаs = new $collectionClassName;
        $this->collвыработкаs->setModel('\выработка');
    }

    /**
     * Gets an array of Childвыработка objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildКалендарь is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|Childвыработка[] List of Childвыработка objects
     * @throws PropelException
     */
    public function getвыработкаs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collвыработкаsPartial && !$this->isNew();
        if (null === $this->collвыработкаs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collвыработкаs) {
                // return empty collection
                $this->initвыработкаs();
            } else {
                $collвыработкаs = ChildвыработкаQuery::create(null, $criteria)
                    ->filterByКалендарь($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collвыработкаsPartial && count($collвыработкаs)) {
                        $this->initвыработкаs(false);

                        foreach ($collвыработкаs as $obj) {
                            if (false == $this->collвыработкаs->contains($obj)) {
                                $this->collвыработкаs->append($obj);
                            }
                        }

                        $this->collвыработкаsPartial = true;
                    }

                    return $collвыработкаs;
                }

                if ($partial && $this->collвыработкаs) {
                    foreach ($this->collвыработкаs as $obj) {
                        if ($obj->isNew()) {
                            $collвыработкаs[] = $obj;
                        }
                    }
                }

                $this->collвыработкаs = $collвыработкаs;
                $this->collвыработкаsPartial = false;
            }
        }

        return $this->collвыработкаs;
    }

    /**
     * Sets a collection of Childвыработка objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�ыработкаs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function setвыработкаs(Collection $�ыработкаs, ConnectionInterface $con = null)
    {
        /** @var Childвыработка[] $�ыработкаsToDelete */
        $�ыработкаsToDelete = $this->getвыработкаs(new Criteria(), $con)->diff($�ыработкаs);

        
        $this->�ыработкаsScheduledForDeletion = $�ыработкаsToDelete;

        foreach ($�ыработкаsToDelete as $�ыработкаRemoved) {
            $�ыработкаRemoved->setКалендарь(null);
        }

        $this->collвыработкаs = null;
        foreach ($�ыработкаs as $�ыработка) {
            $this->addвыработка($�ыработка);
        }

        $this->collвыработкаs = $�ыработкаs;
        $this->collвыработкаsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related выработка objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related выработка objects.
     * @throws PropelException
     */
    public function countвыработкаs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collвыработкаsPartial && !$this->isNew();
        if (null === $this->collвыработкаs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collвыработкаs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getвыработкаs());
            }

            $query = ChildвыработкаQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByКалендарь($this)
                ->count($con);
        }

        return count($this->collвыработкаs);
    }

    /**
     * Method called to associate a Childвыработка object to this object
     * through the Childвыработка foreign key attribute.
     *
     * @param  Childвыработка $l Childвыработка
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function addвыработка(Childвыработка $l)
    {
        if ($this->collвыработкаs === null) {
            $this->initвыработкаs();
            $this->collвыработкаsPartial = true;
        }

        if (!$this->collвыработкаs->contains($l)) {
            $this->doAddвыработка($l);

            if ($this->�ыработкаsScheduledForDeletion and $this->�ыработкаsScheduledForDeletion->contains($l)) {
                $this->�ыработкаsScheduledForDeletion->remove($this->�ыработкаsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param Childвыработка $�ыработка The Childвыработка object to add.
     */
    protected function doAddвыработка(Childвыработка $�ыработка)
    {
        $this->collвыработкаs[]= $�ыработка;
        $�ыработка->setКалендарь($this);
    }

    /**
     * @param  Childвыработка $�ыработка The Childвыработка object to remove.
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function removeвыработка(Childвыработка $�ыработка)
    {
        if ($this->getвыработкаs()->contains($�ыработка)) {
            $pos = $this->collвыработкаs->search($�ыработка);
            $this->collвыработкаs->remove($pos);
            if (null === $this->�ыработкаsScheduledForDeletion) {
                $this->�ыработкаsScheduledForDeletion = clone $this->collвыработкаs;
                $this->�ыработкаsScheduledForDeletion->clear();
            }
            $this->�ыработкаsScheduledForDeletion[]= clone $�ыработка;
            $�ыработка->setКалендарь(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related выработкаs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childвыработка[] List of Childвыработка objects
     */
    public function getвыработкаsJoinтипыработ(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildвыработкаQuery::create(null, $criteria);
        $query->joinWith('типыработ', $joinBehavior);

        return $this->getвыработкаs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related выработкаs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childвыработка[] List of Childвыработка objects
     */
    public function getвыработкаsJoinтипытехникивыработка(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildвыработкаQuery::create(null, $criteria);
        $query->joinWith('типытехникивыработка', $joinBehavior);

        return $this->getвыработкаs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related выработкаs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childвыработка[] List of Childвыработка objects
     */
    public function getвыработкаsJoinучасткиработ(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildвыработкаQuery::create(null, $criteria);
        $query->joinWith('участкиработ', $joinBehavior);

        return $this->getвыработкаs($query, $con);
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
     * If this ChildКалендарь is new, it will return
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
                    ->filterByКалендарь($this)
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
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function setдатыобновленийдашбордовs(Collection $�атыобновленийдашбордовs, ConnectionInterface $con = null)
    {
        /** @var Childдатыобновленийдашбордов[] $�атыобновленийдашбордовsToDelete */
        $�атыобновленийдашбордовsToDelete = $this->getдатыобновленийдашбордовs(new Criteria(), $con)->diff($�атыобновленийдашбордовs);

        
        $this->�атыобновленийдашбордовsScheduledForDeletion = $�атыобновленийдашбордовsToDelete;

        foreach ($�атыобновленийдашбордовsToDelete as $�атыобновленийдашбордовRemoved) {
            $�атыобновленийдашбордовRemoved->setКалендарь(null);
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
                ->filterByКалендарь($this)
                ->count($con);
        }

        return count($this->collдатыобновленийдашбордовs);
    }

    /**
     * Method called to associate a Childдатыобновленийдашбордов object to this object
     * through the Childдатыобновленийдашбордов foreign key attribute.
     *
     * @param  Childдатыобновленийдашбордов $l Childдатыобновленийдашбордов
     * @return $this|\Календарь The current object (for fluent API support)
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
        $�атыобновленийдашбордов->setКалендарь($this);
    }

    /**
     * @param  Childдатыобновленийдашбордов $�атыобновленийдашбордов The Childдатыобновленийдашбордов object to remove.
     * @return $this|ChildКалендарь The current object (for fluent API support)
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
            $this->�атыобновленийдашбордовsScheduledForDeletion[]= clone $�атыобновленийдашбордов;
            $�атыобновленийдашбордов->setКалендарь(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related датыобновленийдашбордовs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childдатыобновленийдашбордов[] List of Childдатыобновленийдашбордов objects
     */
    public function getдатыобновленийдашбордовsJoinПроекты(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildдатыобновленийдашбордовQuery::create(null, $criteria);
        $query->joinWith('Проекты', $joinBehavior);

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
     * If this ChildКалендарь is new, it will return
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
                    ->filterByКалендарь($this)
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
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function setмтрs(Collection $�трs, ConnectionInterface $con = null)
    {
        /** @var Childмтр[] $�трsToDelete */
        $�трsToDelete = $this->getмтрs(new Criteria(), $con)->diff($�трs);

        
        $this->�трsScheduledForDeletion = $�трsToDelete;

        foreach ($�трsToDelete as $�трRemoved) {
            $�трRemoved->setКалендарь(null);
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
                ->filterByКалендарь($this)
                ->count($con);
        }

        return count($this->collмтрs);
    }

    /**
     * Method called to associate a Childмтр object to this object
     * through the Childмтр foreign key attribute.
     *
     * @param  Childмтр $l Childмтр
     * @return $this|\Календарь The current object (for fluent API support)
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
        $�тр->setКалендарь($this);
    }

    /**
     * @param  Childмтр $�тр The Childмтр object to remove.
     * @return $this|ChildКалендарь The current object (for fluent API support)
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
            $this->�трsScheduledForDeletion[]= clone $�тр;
            $�тр->setКалендарь(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мтрs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
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
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мтрs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмтр[] List of Childмтр objects
     */
    public function getмтрsJoinПроекты(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмтрQuery::create(null, $criteria);
        $query->joinWith('Проекты', $joinBehavior);

        return $this->getмтрs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мтрs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
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
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мтрs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
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
     * If this ChildКалендарь is new, it will return
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
                    ->filterByКалендарь($this)
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
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function setмобилизацияs(Collection $�обилизацияs, ConnectionInterface $con = null)
    {
        /** @var Childмобилизация[] $�обилизацияsToDelete */
        $�обилизацияsToDelete = $this->getмобилизацияs(new Criteria(), $con)->diff($�обилизацияs);

        
        $this->�обилизацияsScheduledForDeletion = $�обилизацияsToDelete;

        foreach ($�обилизацияsToDelete as $�обилизацияRemoved) {
            $�обилизацияRemoved->setКалендарь(null);
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
                ->filterByКалендарь($this)
                ->count($con);
        }

        return count($this->collмобилизацияs);
    }

    /**
     * Method called to associate a Childмобилизация object to this object
     * through the Childмобилизация foreign key attribute.
     *
     * @param  Childмобилизация $l Childмобилизация
     * @return $this|\Календарь The current object (for fluent API support)
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
        $�обилизация->setКалендарь($this);
    }

    /**
     * @param  Childмобилизация $�обилизация The Childмобилизация object to remove.
     * @return $this|ChildКалендарь The current object (for fluent API support)
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
            $�обилизация->setКалендарь(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мобилизацияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизация[] List of Childмобилизация objects
     */
    public function getмобилизацияsJoinПроекты(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияQuery::create(null, $criteria);
        $query->joinWith('Проекты', $joinBehavior);

        return $this->getмобилизацияs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мобилизацияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
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
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мобилизацияs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
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
     * If this ChildКалендарь is new, it will return
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
                    ->filterByКалендарь($this)
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
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function setмобилизацияпомесяцамs(Collection $�обилизацияпомесяцамs, ConnectionInterface $con = null)
    {
        /** @var Childмобилизацияпомесяцам[] $�обилизацияпомесяцамsToDelete */
        $�обилизацияпомесяцамsToDelete = $this->getмобилизацияпомесяцамs(new Criteria(), $con)->diff($�обилизацияпомесяцамs);

        
        $this->�обилизацияпомесяцамsScheduledForDeletion = $�обилизацияпомесяцамsToDelete;

        foreach ($�обилизацияпомесяцамsToDelete as $�обилизацияпомесяцамRemoved) {
            $�обилизацияпомесяцамRemoved->setКалендарь(null);
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
                ->filterByКалендарь($this)
                ->count($con);
        }

        return count($this->collмобилизацияпомесяцамs);
    }

    /**
     * Method called to associate a Childмобилизацияпомесяцам object to this object
     * through the Childмобилизацияпомесяцам foreign key attribute.
     *
     * @param  Childмобилизацияпомесяцам $l Childмобилизацияпомесяцам
     * @return $this|\Календарь The current object (for fluent API support)
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
        $�обилизацияпомесяцам->setКалендарь($this);
    }

    /**
     * @param  Childмобилизацияпомесяцам $�обилизацияпомесяцам The Childмобилизацияпомесяцам object to remove.
     * @return $this|ChildКалендарь The current object (for fluent API support)
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
            $�обилизацияпомесяцам->setКалендарь(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
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
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
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
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
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
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related мобилизацияпомесяцамs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childмобилизацияпомесяцам[] List of Childмобилизацияпомесяцам objects
     */
    public function getмобилизацияпомесяцамsJoinПроекты(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildмобилизацияпомесяцамQuery::create(null, $criteria);
        $query->joinWith('Проекты', $joinBehavior);

        return $this->getмобилизацияпомесяцамs($query, $con);
    }

    /**
     * Clears out the collПредписанияsRelatedByдатавыдачи collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addПредписанияsRelatedByдатавыдачи()
     */
    public function clearПредписанияsRelatedByдатавыдачи()
    {
        $this->collПредписанияsRelatedByдатавыдачи = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collПредписанияsRelatedByдатавыдачи collection loaded partially.
     */
    public function resetPartialПредписанияsRelatedByдатавыдачи($v = true)
    {
        $this->collПредписанияsRelatedByдатавыдачиPartial = $v;
    }

    /**
     * Initializes the collПредписанияsRelatedByдатавыдачи collection.
     *
     * By default this just sets the collПредписанияsRelatedByдатавыдачи collection to an empty array (like clearcollПредписанияsRelatedByдатавыдачи());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initПредписанияsRelatedByдатавыдачи($overrideExisting = true)
    {
        if (null !== $this->collПредписанияsRelatedByдатавыдачи && !$overrideExisting) {
            return;
        }

        $collectionClassName = ПредписанияTableMap::getTableMap()->getCollectionClassName();

        $this->collПредписанияsRelatedByдатавыдачи = new $collectionClassName;
        $this->collПредписанияsRelatedByдатавыдачи->setModel('\Предписания');
    }

    /**
     * Gets an array of ChildПредписания objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildКалендарь is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     * @throws PropelException
     */
    public function getПредписанияsRelatedByдатавыдачи(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collПредписанияsRelatedByдатавыдачиPartial && !$this->isNew();
        if (null === $this->collПредписанияsRelatedByдатавыдачи || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collПредписанияsRelatedByдатавыдачи) {
                // return empty collection
                $this->initПредписанияsRelatedByдатавыдачи();
            } else {
                $collПредписанияsRelatedByдатавыдачи = ChildПредписанияQuery::create(null, $criteria)
                    ->filterByКалендарьRelatedByдатавыдачи($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collПредписанияsRelatedByдатавыдачиPartial && count($collПредписанияsRelatedByдатавыдачи)) {
                        $this->initПредписанияsRelatedByдатавыдачи(false);

                        foreach ($collПредписанияsRelatedByдатавыдачи as $obj) {
                            if (false == $this->collПредписанияsRelatedByдатавыдачи->contains($obj)) {
                                $this->collПредписанияsRelatedByдатавыдачи->append($obj);
                            }
                        }

                        $this->collПредписанияsRelatedByдатавыдачиPartial = true;
                    }

                    return $collПредписанияsRelatedByдатавыдачи;
                }

                if ($partial && $this->collПредписанияsRelatedByдатавыдачи) {
                    foreach ($this->collПредписанияsRelatedByдатавыдачи as $obj) {
                        if ($obj->isNew()) {
                            $collПредписанияsRelatedByдатавыдачи[] = $obj;
                        }
                    }
                }

                $this->collПредписанияsRelatedByдатавыдачи = $collПредписанияsRelatedByдатавыдачи;
                $this->collПредписанияsRelatedByдатавыдачиPartial = false;
            }
        }

        return $this->collПредписанияsRelatedByдатавыдачи;
    }

    /**
     * Sets a collection of ChildПредписания objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�редписанияsRelatedByдатавыдачи A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function setПредписанияsRelatedByдатавыдачи(Collection $�редписанияsRelatedByдатавыдачи, ConnectionInterface $con = null)
    {
        /** @var ChildПредписания[] $�редписанияsRelatedByдатавыдачиToDelete */
        $�редписанияsRelatedByдатавыдачиToDelete = $this->getПредписанияsRelatedByдатавыдачи(new Criteria(), $con)->diff($�редписанияsRelatedByдатавыдачи);

        
        $this->�редписанияsRelatedByдатавыдачиScheduledForDeletion = $�редписанияsRelatedByдатавыдачиToDelete;

        foreach ($�редписанияsRelatedByдатавыдачиToDelete as $�редписанияRelatedByдатавыдачиRemoved) {
            $�редписанияRelatedByдатавыдачиRemoved->setКалендарьRelatedByдатавыдачи(null);
        }

        $this->collПредписанияsRelatedByдатавыдачи = null;
        foreach ($�редписанияsRelatedByдатавыдачи as $�редписанияRelatedByдатавыдачи) {
            $this->addПредписанияRelatedByдатавыдачи($�редписанияRelatedByдатавыдачи);
        }

        $this->collПредписанияsRelatedByдатавыдачи = $�редписанияsRelatedByдатавыдачи;
        $this->collПредписанияsRelatedByдатавыдачиPartial = false;

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
    public function countПредписанияsRelatedByдатавыдачи(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collПредписанияsRelatedByдатавыдачиPartial && !$this->isNew();
        if (null === $this->collПредписанияsRelatedByдатавыдачи || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collПредписанияsRelatedByдатавыдачи) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getПредписанияsRelatedByдатавыдачи());
            }

            $query = ChildПредписанияQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByКалендарьRelatedByдатавыдачи($this)
                ->count($con);
        }

        return count($this->collПредписанияsRelatedByдатавыдачи);
    }

    /**
     * Method called to associate a ChildПредписания object to this object
     * through the ChildПредписания foreign key attribute.
     *
     * @param  ChildПредписания $l ChildПредписания
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function addПредписанияRelatedByдатавыдачи(ChildПредписания $l)
    {
        if ($this->collПредписанияsRelatedByдатавыдачи === null) {
            $this->initПредписанияsRelatedByдатавыдачи();
            $this->collПредписанияsRelatedByдатавыдачиPartial = true;
        }

        if (!$this->collПредписанияsRelatedByдатавыдачи->contains($l)) {
            $this->doAddПредписанияRelatedByдатавыдачи($l);

            if ($this->�редписанияsRelatedByдатавыдачиScheduledForDeletion and $this->�редписанияsRelatedByдатавыдачиScheduledForDeletion->contains($l)) {
                $this->�редписанияsRelatedByдатавыдачиScheduledForDeletion->remove($this->�редписанияsRelatedByдатавыдачиScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildПредписания $�редписанияRelatedByдатавыдачи The ChildПредписания object to add.
     */
    protected function doAddПредписанияRelatedByдатавыдачи(ChildПредписания $�редписанияRelatedByдатавыдачи)
    {
        $this->collПредписанияsRelatedByдатавыдачи[]= $�редписанияRelatedByдатавыдачи;
        $�редписанияRelatedByдатавыдачи->setКалендарьRelatedByдатавыдачи($this);
    }

    /**
     * @param  ChildПредписания $�редписанияRelatedByдатавыдачи The ChildПредписания object to remove.
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function removeПредписанияRelatedByдатавыдачи(ChildПредписания $�редписанияRelatedByдатавыдачи)
    {
        if ($this->getПредписанияsRelatedByдатавыдачи()->contains($�редписанияRelatedByдатавыдачи)) {
            $pos = $this->collПредписанияsRelatedByдатавыдачи->search($�редписанияRelatedByдатавыдачи);
            $this->collПредписанияsRelatedByдатавыдачи->remove($pos);
            if (null === $this->�редписанияsRelatedByдатавыдачиScheduledForDeletion) {
                $this->�редписанияsRelatedByдатавыдачиScheduledForDeletion = clone $this->collПредписанияsRelatedByдатавыдачи;
                $this->�редписанияsRelatedByдатавыдачиScheduledForDeletion->clear();
            }
            $this->�редписанияsRelatedByдатавыдачиScheduledForDeletion[]= clone $�редписанияRelatedByдатавыдачи;
            $�редписанияRelatedByдатавыдачи->setКалендарьRelatedByдатавыдачи(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByдатавыдачи from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByдатавыдачиJoinКонтролирующиеОрганы(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('КонтролирующиеОрганы', $joinBehavior);

        return $this->getПредписанияsRelatedByдатавыдачи($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByдатавыдачи from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByдатавыдачиJoinПодрядчикиПредписания(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('ПодрядчикиПредписания', $joinBehavior);

        return $this->getПредписанияsRelatedByдатавыдачи($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByдатавыдачи from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByдатавыдачиJoinПроекты(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('Проекты', $joinBehavior);

        return $this->getПредписанияsRelatedByдатавыдачи($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByдатавыдачи from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByдатавыдачиJoinСтатусыЗаявкиЗавершение(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('СтатусыЗаявкиЗавершение', $joinBehavior);

        return $this->getПредписанияsRelatedByдатавыдачи($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByдатавыдачи from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByдатавыдачиJoinСтатусыЗаявкиПросрочка(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('СтатусыЗаявкиПросрочка', $joinBehavior);

        return $this->getПредписанияsRelatedByдатавыдачи($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByдатавыдачи from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByдатавыдачиJoinТипыЗамечаний(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('ТипыЗамечаний', $joinBehavior);

        return $this->getПредписанияsRelatedByдатавыдачи($query, $con);
    }

    /**
     * Clears out the collПредписанияsRelatedByплановаядатаустранения collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addПредписанияsRelatedByплановаядатаустранения()
     */
    public function clearПредписанияsRelatedByплановаядатаустранения()
    {
        $this->collПредписанияsRelatedByплановаядатаустранения = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collПредписанияsRelatedByплановаядатаустранения collection loaded partially.
     */
    public function resetPartialПредписанияsRelatedByплановаядатаустранения($v = true)
    {
        $this->collПредписанияsRelatedByплановаядатаустраненияPartial = $v;
    }

    /**
     * Initializes the collПредписанияsRelatedByплановаядатаустранения collection.
     *
     * By default this just sets the collПредписанияsRelatedByплановаядатаустранения collection to an empty array (like clearcollПредписанияsRelatedByплановаядатаустранения());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initПредписанияsRelatedByплановаядатаустранения($overrideExisting = true)
    {
        if (null !== $this->collПредписанияsRelatedByплановаядатаустранения && !$overrideExisting) {
            return;
        }

        $collectionClassName = ПредписанияTableMap::getTableMap()->getCollectionClassName();

        $this->collПредписанияsRelatedByплановаядатаустранения = new $collectionClassName;
        $this->collПредписанияsRelatedByплановаядатаустранения->setModel('\Предписания');
    }

    /**
     * Gets an array of ChildПредписания objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildКалендарь is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     * @throws PropelException
     */
    public function getПредписанияsRelatedByплановаядатаустранения(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collПредписанияsRelatedByплановаядатаустраненияPartial && !$this->isNew();
        if (null === $this->collПредписанияsRelatedByплановаядатаустранения || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collПредписанияsRelatedByплановаядатаустранения) {
                // return empty collection
                $this->initПредписанияsRelatedByплановаядатаустранения();
            } else {
                $collПредписанияsRelatedByплановаядатаустранения = ChildПредписанияQuery::create(null, $criteria)
                    ->filterByКалендарьRelatedByплановаядатаустранения($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collПредписанияsRelatedByплановаядатаустраненияPartial && count($collПредписанияsRelatedByплановаядатаустранения)) {
                        $this->initПредписанияsRelatedByплановаядатаустранения(false);

                        foreach ($collПредписанияsRelatedByплановаядатаустранения as $obj) {
                            if (false == $this->collПредписанияsRelatedByплановаядатаустранения->contains($obj)) {
                                $this->collПредписанияsRelatedByплановаядатаустранения->append($obj);
                            }
                        }

                        $this->collПредписанияsRelatedByплановаядатаустраненияPartial = true;
                    }

                    return $collПредписанияsRelatedByплановаядатаустранения;
                }

                if ($partial && $this->collПредписанияsRelatedByплановаядатаустранения) {
                    foreach ($this->collПредписанияsRelatedByплановаядатаустранения as $obj) {
                        if ($obj->isNew()) {
                            $collПредписанияsRelatedByплановаядатаустранения[] = $obj;
                        }
                    }
                }

                $this->collПредписанияsRelatedByплановаядатаустранения = $collПредписанияsRelatedByплановаядатаустранения;
                $this->collПредписанияsRelatedByплановаядатаустраненияPartial = false;
            }
        }

        return $this->collПредписанияsRelatedByплановаядатаустранения;
    }

    /**
     * Sets a collection of ChildПредписания objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�редписанияsRelatedByплановаядатаустранения A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function setПредписанияsRelatedByплановаядатаустранения(Collection $�редписанияsRelatedByплановаядатаустранения, ConnectionInterface $con = null)
    {
        /** @var ChildПредписания[] $�редписанияsRelatedByплановаядатаустраненияToDelete */
        $�редписанияsRelatedByплановаядатаустраненияToDelete = $this->getПредписанияsRelatedByплановаядатаустранения(new Criteria(), $con)->diff($�редписанияsRelatedByплановаядатаустранения);

        
        $this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion = $�редписанияsRelatedByплановаядатаустраненияToDelete;

        foreach ($�редписанияsRelatedByплановаядатаустраненияToDelete as $�редписанияRelatedByплановаядатаустраненияRemoved) {
            $�редписанияRelatedByплановаядатаустраненияRemoved->setКалендарьRelatedByплановаядатаустранения(null);
        }

        $this->collПредписанияsRelatedByплановаядатаустранения = null;
        foreach ($�редписанияsRelatedByплановаядатаустранения as $�редписанияRelatedByплановаядатаустранения) {
            $this->addПредписанияRelatedByплановаядатаустранения($�редписанияRelatedByплановаядатаустранения);
        }

        $this->collПредписанияsRelatedByплановаядатаустранения = $�редписанияsRelatedByплановаядатаустранения;
        $this->collПредписанияsRelatedByплановаядатаустраненияPartial = false;

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
    public function countПредписанияsRelatedByплановаядатаустранения(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collПредписанияsRelatedByплановаядатаустраненияPartial && !$this->isNew();
        if (null === $this->collПредписанияsRelatedByплановаядатаустранения || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collПредписанияsRelatedByплановаядатаустранения) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getПредписанияsRelatedByплановаядатаустранения());
            }

            $query = ChildПредписанияQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByКалендарьRelatedByплановаядатаустранения($this)
                ->count($con);
        }

        return count($this->collПредписанияsRelatedByплановаядатаустранения);
    }

    /**
     * Method called to associate a ChildПредписания object to this object
     * through the ChildПредписания foreign key attribute.
     *
     * @param  ChildПредписания $l ChildПредписания
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function addПредписанияRelatedByплановаядатаустранения(ChildПредписания $l)
    {
        if ($this->collПредписанияsRelatedByплановаядатаустранения === null) {
            $this->initПредписанияsRelatedByплановаядатаустранения();
            $this->collПредписанияsRelatedByплановаядатаустраненияPartial = true;
        }

        if (!$this->collПредписанияsRelatedByплановаядатаустранения->contains($l)) {
            $this->doAddПредписанияRelatedByплановаядатаустранения($l);

            if ($this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion and $this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion->contains($l)) {
                $this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion->remove($this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildПредписания $�редписанияRelatedByплановаядатаустранения The ChildПредписания object to add.
     */
    protected function doAddПредписанияRelatedByплановаядатаустранения(ChildПредписания $�редписанияRelatedByплановаядатаустранения)
    {
        $this->collПредписанияsRelatedByплановаядатаустранения[]= $�редписанияRelatedByплановаядатаустранения;
        $�редписанияRelatedByплановаядатаустранения->setКалендарьRelatedByплановаядатаустранения($this);
    }

    /**
     * @param  ChildПредписания $�редписанияRelatedByплановаядатаустранения The ChildПредписания object to remove.
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function removeПредписанияRelatedByплановаядатаустранения(ChildПредписания $�редписанияRelatedByплановаядатаустранения)
    {
        if ($this->getПредписанияsRelatedByплановаядатаустранения()->contains($�редписанияRelatedByплановаядатаустранения)) {
            $pos = $this->collПредписанияsRelatedByплановаядатаустранения->search($�редписанияRelatedByплановаядатаустранения);
            $this->collПредписанияsRelatedByплановаядатаустранения->remove($pos);
            if (null === $this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion) {
                $this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion = clone $this->collПредписанияsRelatedByплановаядатаустранения;
                $this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion->clear();
            }
            $this->�редписанияsRelatedByплановаядатаустраненияScheduledForDeletion[]= clone $�редписанияRelatedByплановаядатаустранения;
            $�редписанияRelatedByплановаядатаустранения->setКалендарьRelatedByплановаядатаустранения(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByплановаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByплановаядатаустраненияJoinКонтролирующиеОрганы(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('КонтролирующиеОрганы', $joinBehavior);

        return $this->getПредписанияsRelatedByплановаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByплановаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByплановаядатаустраненияJoinПодрядчикиПредписания(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('ПодрядчикиПредписания', $joinBehavior);

        return $this->getПредписанияsRelatedByплановаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByплановаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByплановаядатаустраненияJoinПроекты(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('Проекты', $joinBehavior);

        return $this->getПредписанияsRelatedByплановаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByплановаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByплановаядатаустраненияJoinСтатусыЗаявкиЗавершение(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('СтатусыЗаявкиЗавершение', $joinBehavior);

        return $this->getПредписанияsRelatedByплановаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByплановаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByплановаядатаустраненияJoinСтатусыЗаявкиПросрочка(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('СтатусыЗаявкиПросрочка', $joinBehavior);

        return $this->getПредписанияsRelatedByплановаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByплановаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByплановаядатаустраненияJoinТипыЗамечаний(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('ТипыЗамечаний', $joinBehavior);

        return $this->getПредписанияsRelatedByплановаядатаустранения($query, $con);
    }

    /**
     * Clears out the collПредписанияsRelatedByфактическаядатаустранения collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addПредписанияsRelatedByфактическаядатаустранения()
     */
    public function clearПредписанияsRelatedByфактическаядатаустранения()
    {
        $this->collПредписанияsRelatedByфактическаядатаустранения = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collПредписанияsRelatedByфактическаядатаустранения collection loaded partially.
     */
    public function resetPartialПредписанияsRelatedByфактическаядатаустранения($v = true)
    {
        $this->collПредписанияsRelatedByфактическаядатаустраненияPartial = $v;
    }

    /**
     * Initializes the collПредписанияsRelatedByфактическаядатаустранения collection.
     *
     * By default this just sets the collПредписанияsRelatedByфактическаядатаустранения collection to an empty array (like clearcollПредписанияsRelatedByфактическаядатаустранения());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initПредписанияsRelatedByфактическаядатаустранения($overrideExisting = true)
    {
        if (null !== $this->collПредписанияsRelatedByфактическаядатаустранения && !$overrideExisting) {
            return;
        }

        $collectionClassName = ПредписанияTableMap::getTableMap()->getCollectionClassName();

        $this->collПредписанияsRelatedByфактическаядатаустранения = new $collectionClassName;
        $this->collПредписанияsRelatedByфактическаядатаустранения->setModel('\Предписания');
    }

    /**
     * Gets an array of ChildПредписания objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildКалендарь is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     * @throws PropelException
     */
    public function getПредписанияsRelatedByфактическаядатаустранения(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collПредписанияsRelatedByфактическаядатаустраненияPartial && !$this->isNew();
        if (null === $this->collПредписанияsRelatedByфактическаядатаустранения || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collПредписанияsRelatedByфактическаядатаустранения) {
                // return empty collection
                $this->initПредписанияsRelatedByфактическаядатаустранения();
            } else {
                $collПредписанияsRelatedByфактическаядатаустранения = ChildПредписанияQuery::create(null, $criteria)
                    ->filterByКалендарьRelatedByфактическаядатаустранения($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collПредписанияsRelatedByфактическаядатаустраненияPartial && count($collПредписанияsRelatedByфактическаядатаустранения)) {
                        $this->initПредписанияsRelatedByфактическаядатаустранения(false);

                        foreach ($collПредписанияsRelatedByфактическаядатаустранения as $obj) {
                            if (false == $this->collПредписанияsRelatedByфактическаядатаустранения->contains($obj)) {
                                $this->collПредписанияsRelatedByфактическаядатаустранения->append($obj);
                            }
                        }

                        $this->collПредписанияsRelatedByфактическаядатаустраненияPartial = true;
                    }

                    return $collПредписанияsRelatedByфактическаядатаустранения;
                }

                if ($partial && $this->collПредписанияsRelatedByфактическаядатаустранения) {
                    foreach ($this->collПредписанияsRelatedByфактическаядатаустранения as $obj) {
                        if ($obj->isNew()) {
                            $collПредписанияsRelatedByфактическаядатаустранения[] = $obj;
                        }
                    }
                }

                $this->collПредписанияsRelatedByфактическаядатаустранения = $collПредписанияsRelatedByфактическаядатаустранения;
                $this->collПредписанияsRelatedByфактическаядатаустраненияPartial = false;
            }
        }

        return $this->collПредписанияsRelatedByфактическаядатаустранения;
    }

    /**
     * Sets a collection of ChildПредписания objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�редписанияsRelatedByфактическаядатаустранения A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function setПредписанияsRelatedByфактическаядатаустранения(Collection $�редписанияsRelatedByфактическаядатаустранения, ConnectionInterface $con = null)
    {
        /** @var ChildПредписания[] $�редписанияsRelatedByфактическаядатаустраненияToDelete */
        $�редписанияsRelatedByфактическаядатаустраненияToDelete = $this->getПредписанияsRelatedByфактическаядатаустранения(new Criteria(), $con)->diff($�редписанияsRelatedByфактическаядатаустранения);

        
        $this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion = $�редписанияsRelatedByфактическаядатаустраненияToDelete;

        foreach ($�редписанияsRelatedByфактическаядатаустраненияToDelete as $�редписанияRelatedByфактическаядатаустраненияRemoved) {
            $�редписанияRelatedByфактическаядатаустраненияRemoved->setКалендарьRelatedByфактическаядатаустранения(null);
        }

        $this->collПредписанияsRelatedByфактическаядатаустранения = null;
        foreach ($�редписанияsRelatedByфактическаядатаустранения as $�редписанияRelatedByфактическаядатаустранения) {
            $this->addПредписанияRelatedByфактическаядатаустранения($�редписанияRelatedByфактическаядатаустранения);
        }

        $this->collПредписанияsRelatedByфактическаядатаустранения = $�редписанияsRelatedByфактическаядатаустранения;
        $this->collПредписанияsRelatedByфактическаядатаустраненияPartial = false;

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
    public function countПредписанияsRelatedByфактическаядатаустранения(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collПредписанияsRelatedByфактическаядатаустраненияPartial && !$this->isNew();
        if (null === $this->collПредписанияsRelatedByфактическаядатаустранения || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collПредписанияsRelatedByфактическаядатаустранения) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getПредписанияsRelatedByфактическаядатаустранения());
            }

            $query = ChildПредписанияQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByКалендарьRelatedByфактическаядатаустранения($this)
                ->count($con);
        }

        return count($this->collПредписанияsRelatedByфактическаядатаустранения);
    }

    /**
     * Method called to associate a ChildПредписания object to this object
     * through the ChildПредписания foreign key attribute.
     *
     * @param  ChildПредписания $l ChildПредписания
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function addПредписанияRelatedByфактическаядатаустранения(ChildПредписания $l)
    {
        if ($this->collПредписанияsRelatedByфактическаядатаустранения === null) {
            $this->initПредписанияsRelatedByфактическаядатаустранения();
            $this->collПредписанияsRelatedByфактическаядатаустраненияPartial = true;
        }

        if (!$this->collПредписанияsRelatedByфактическаядатаустранения->contains($l)) {
            $this->doAddПредписанияRelatedByфактическаядатаустранения($l);

            if ($this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion and $this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion->contains($l)) {
                $this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion->remove($this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildПредписания $�редписанияRelatedByфактическаядатаустранения The ChildПредписания object to add.
     */
    protected function doAddПредписанияRelatedByфактическаядатаустранения(ChildПредписания $�редписанияRelatedByфактическаядатаустранения)
    {
        $this->collПредписанияsRelatedByфактическаядатаустранения[]= $�редписанияRelatedByфактическаядатаустранения;
        $�редписанияRelatedByфактическаядатаустранения->setКалендарьRelatedByфактическаядатаустранения($this);
    }

    /**
     * @param  ChildПредписания $�редписанияRelatedByфактическаядатаустранения The ChildПредписания object to remove.
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function removeПредписанияRelatedByфактическаядатаустранения(ChildПредписания $�редписанияRelatedByфактическаядатаустранения)
    {
        if ($this->getПредписанияsRelatedByфактическаядатаустранения()->contains($�редписанияRelatedByфактическаядатаустранения)) {
            $pos = $this->collПредписанияsRelatedByфактическаядатаустранения->search($�редписанияRelatedByфактическаядатаустранения);
            $this->collПредписанияsRelatedByфактическаядатаустранения->remove($pos);
            if (null === $this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion) {
                $this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion = clone $this->collПредписанияsRelatedByфактическаядатаустранения;
                $this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion->clear();
            }
            $this->�редписанияsRelatedByфактическаядатаустраненияScheduledForDeletion[]= $�редписанияRelatedByфактическаядатаустранения;
            $�редписанияRelatedByфактическаядатаустранения->setКалендарьRelatedByфактическаядатаустранения(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByфактическаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByфактическаядатаустраненияJoinКонтролирующиеОрганы(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('КонтролирующиеОрганы', $joinBehavior);

        return $this->getПредписанияsRelatedByфактическаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByфактическаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByфактическаядатаустраненияJoinПодрядчикиПредписания(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('ПодрядчикиПредписания', $joinBehavior);

        return $this->getПредписанияsRelatedByфактическаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByфактическаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByфактическаядатаустраненияJoinПроекты(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('Проекты', $joinBehavior);

        return $this->getПредписанияsRelatedByфактическаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByфактическаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByфактическаядатаустраненияJoinСтатусыЗаявкиЗавершение(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('СтатусыЗаявкиЗавершение', $joinBehavior);

        return $this->getПредписанияsRelatedByфактическаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByфактическаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByфактическаядатаустраненияJoinСтатусыЗаявкиПросрочка(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('СтатусыЗаявкиПросрочка', $joinBehavior);

        return $this->getПредписанияsRelatedByфактическаядатаустранения($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related ПредписанияsRelatedByфактическаядатаустранения from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildПредписания[] List of ChildПредписания objects
     */
    public function getПредписанияsRelatedByфактическаядатаустраненияJoinТипыЗамечаний(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildПредписанияQuery::create(null, $criteria);
        $query->joinWith('ТипыЗамечаний', $joinBehavior);

        return $this->getПредписанияsRelatedByфактическаядатаустранения($query, $con);
    }

    /**
     * Clears out the collфизическиеобъёмыs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addфизическиеобъёмыs()
     */
    public function clearфизическиеобъёмыs()
    {
        $this->collфизическиеобъёмыs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collфизическиеобъёмыs collection loaded partially.
     */
    public function resetPartialфизическиеобъёмыs($v = true)
    {
        $this->collфизическиеобъёмыsPartial = $v;
    }

    /**
     * Initializes the collфизическиеобъёмыs collection.
     *
     * By default this just sets the collфизическиеобъёмыs collection to an empty array (like clearcollфизическиеобъёмыs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initфизическиеобъёмыs($overrideExisting = true)
    {
        if (null !== $this->collфизическиеобъёмыs && !$overrideExisting) {
            return;
        }

        $collectionClassName = физическиеобъёмыTableMap::getTableMap()->getCollectionClassName();

        $this->collфизическиеобъёмыs = new $collectionClassName;
        $this->collфизическиеобъёмыs->setModel('\физическиеобъёмы');
    }

    /**
     * Gets an array of Childфизическиеобъёмы objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildКалендарь is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|Childфизическиеобъёмы[] List of Childфизическиеобъёмы objects
     * @throws PropelException
     */
    public function getфизическиеобъёмыs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collфизическиеобъёмыsPartial && !$this->isNew();
        if (null === $this->collфизическиеобъёмыs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collфизическиеобъёмыs) {
                // return empty collection
                $this->initфизическиеобъёмыs();
            } else {
                $collфизическиеобъёмыs = ChildфизическиеобъёмыQuery::create(null, $criteria)
                    ->filterByКалендарь($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collфизическиеобъёмыsPartial && count($collфизическиеобъёмыs)) {
                        $this->initфизическиеобъёмыs(false);

                        foreach ($collфизическиеобъёмыs as $obj) {
                            if (false == $this->collфизическиеобъёмыs->contains($obj)) {
                                $this->collфизическиеобъёмыs->append($obj);
                            }
                        }

                        $this->collфизическиеобъёмыsPartial = true;
                    }

                    return $collфизическиеобъёмыs;
                }

                if ($partial && $this->collфизическиеобъёмыs) {
                    foreach ($this->collфизическиеобъёмыs as $obj) {
                        if ($obj->isNew()) {
                            $collфизическиеобъёмыs[] = $obj;
                        }
                    }
                }

                $this->collфизическиеобъёмыs = $collфизическиеобъёмыs;
                $this->collфизическиеобъёмыsPartial = false;
            }
        }

        return $this->collфизическиеобъёмыs;
    }

    /**
     * Sets a collection of Childфизическиеобъёмы objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $�изическиеобъёмыs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function setфизическиеобъёмыs(Collection $�изическиеобъёмыs, ConnectionInterface $con = null)
    {
        /** @var Childфизическиеобъёмы[] $�изическиеобъёмыsToDelete */
        $�изическиеобъёмыsToDelete = $this->getфизическиеобъёмыs(new Criteria(), $con)->diff($�изическиеобъёмыs);

        
        $this->�изическиеобъёмыsScheduledForDeletion = $�изическиеобъёмыsToDelete;

        foreach ($�изическиеобъёмыsToDelete as $�изическиеобъёмыRemoved) {
            $�изическиеобъёмыRemoved->setКалендарь(null);
        }

        $this->collфизическиеобъёмыs = null;
        foreach ($�изическиеобъёмыs as $�изическиеобъёмы) {
            $this->addфизическиеобъёмы($�изическиеобъёмы);
        }

        $this->collфизическиеобъёмыs = $�изическиеобъёмыs;
        $this->collфизическиеобъёмыsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related физическиеобъёмы objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related физическиеобъёмы objects.
     * @throws PropelException
     */
    public function countфизическиеобъёмыs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collфизическиеобъёмыsPartial && !$this->isNew();
        if (null === $this->collфизическиеобъёмыs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collфизическиеобъёмыs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getфизическиеобъёмыs());
            }

            $query = ChildфизическиеобъёмыQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByКалендарь($this)
                ->count($con);
        }

        return count($this->collфизическиеобъёмыs);
    }

    /**
     * Method called to associate a Childфизическиеобъёмы object to this object
     * through the Childфизическиеобъёмы foreign key attribute.
     *
     * @param  Childфизическиеобъёмы $l Childфизическиеобъёмы
     * @return $this|\Календарь The current object (for fluent API support)
     */
    public function addфизическиеобъёмы(Childфизическиеобъёмы $l)
    {
        if ($this->collфизическиеобъёмыs === null) {
            $this->initфизическиеобъёмыs();
            $this->collфизическиеобъёмыsPartial = true;
        }

        if (!$this->collфизическиеобъёмыs->contains($l)) {
            $this->doAddфизическиеобъёмы($l);

            if ($this->�изическиеобъёмыsScheduledForDeletion and $this->�изическиеобъёмыsScheduledForDeletion->contains($l)) {
                $this->�изическиеобъёмыsScheduledForDeletion->remove($this->�изическиеобъёмыsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param Childфизическиеобъёмы $�изическиеобъёмы The Childфизическиеобъёмы object to add.
     */
    protected function doAddфизическиеобъёмы(Childфизическиеобъёмы $�изическиеобъёмы)
    {
        $this->collфизическиеобъёмыs[]= $�изическиеобъёмы;
        $�изическиеобъёмы->setКалендарь($this);
    }

    /**
     * @param  Childфизическиеобъёмы $�изическиеобъёмы The Childфизическиеобъёмы object to remove.
     * @return $this|ChildКалендарь The current object (for fluent API support)
     */
    public function removeфизическиеобъёмы(Childфизическиеобъёмы $�изическиеобъёмы)
    {
        if ($this->getфизическиеобъёмыs()->contains($�изическиеобъёмы)) {
            $pos = $this->collфизическиеобъёмыs->search($�изическиеобъёмы);
            $this->collфизическиеобъёмыs->remove($pos);
            if (null === $this->�изическиеобъёмыsScheduledForDeletion) {
                $this->�изическиеобъёмыsScheduledForDeletion = clone $this->collфизическиеобъёмыs;
                $this->�изическиеобъёмыsScheduledForDeletion->clear();
            }
            $this->�изическиеобъёмыsScheduledForDeletion[]= clone $�изическиеобъёмы;
            $�изическиеобъёмы->setКалендарь(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related физическиеобъёмыs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childфизическиеобъёмы[] List of Childфизическиеобъёмы objects
     */
    public function getфизическиеобъёмыsJoinучасткиработ(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildфизическиеобъёмыQuery::create(null, $criteria);
        $query->joinWith('участкиработ', $joinBehavior);

        return $this->getфизическиеобъёмыs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Календарь is new, it will return
     * an empty collection; or if this Календарь has previously
     * been saved, it will retrieve related физическиеобъёмыs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Календарь.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|Childфизическиеобъёмы[] List of Childфизическиеобъёмы objects
     */
    public function getфизическиеобъёмыsJoinтипыработ(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildфизическиеобъёмыQuery::create(null, $criteria);
        $query->joinWith('типыработ', $joinBehavior);

        return $this->getфизическиеобъёмыs($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aгода) {
            $this->aгода->removeКалендарь($this);
        }
        if (null !== $this->aднинедели) {
            $this->aднинедели->removeКалендарь($this);
        }
        if (null !== $this->aмесяца) {
            $this->aмесяца->removeКалендарь($this);
        }
        $this->дата = null;
        $this->год = null;
        $this->полугодие = null;
        $this->квартал = null;
        $this->номер_месяца = null;
        $this->месяц = null;
        $this->день = null;
        $this->номер_недели = null;
        $this->день_недели = null;
        $this->день_в_году = null;
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
            if ($this->collвыработкаs) {
                foreach ($this->collвыработкаs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
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
            if ($this->collПредписанияsRelatedByдатавыдачи) {
                foreach ($this->collПредписанияsRelatedByдатавыдачи as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collПредписанияsRelatedByплановаядатаустранения) {
                foreach ($this->collПредписанияsRelatedByплановаядатаустранения as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collПредписанияsRelatedByфактическаядатаустранения) {
                foreach ($this->collПредписанияsRelatedByфактическаядатаустранения as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collфизическиеобъёмыs) {
                foreach ($this->collфизическиеобъёмыs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collвыработкаs = null;
        $this->collдатыобновленийдашбордовs = null;
        $this->collмтрs = null;
        $this->collмобилизацияs = null;
        $this->collмобилизацияпомесяцамs = null;
        $this->collПредписанияsRelatedByдатавыдачи = null;
        $this->collПредписанияsRelatedByплановаядатаустранения = null;
        $this->collПредписанияsRelatedByфактическаядатаустранения = null;
        $this->collфизическиеобъёмыs = null;
        $this->aгода = null;
        $this->aднинедели = null;
        $this->aмесяца = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(КалендарьTableMap::DEFAULT_STRING_FORMAT);
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
