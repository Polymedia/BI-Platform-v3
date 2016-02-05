<?php

namespace Base;

use \мобилизацияпомесяцам as Childмобилизацияпомесяцам;
use \мобилизацияпомесяцамQuery as ChildмобилизацияпомесяцамQuery;
use \Exception;
use \PDO;
use Map\мобилизацияпомесяцамTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Мобилизация_по_месяцам' table.
 *
 * 
 *
 * @method     ChildмобилизацияпомесяцамQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildмобилизацияпомесяцамQuery orderByтиптехники($order = Criteria::ASC) Order by the Тип_техники column
 * @method     ChildмобилизацияпомесяцамQuery orderByпланотгрузкаколичество($order = Criteria::ASC) Order by the План_отгрузка_количество column
 * @method     ChildмобилизацияпомесяцамQuery orderByфактотгрузкаколичество($order = Criteria::ASC) Order by the Факт_отгрузка_количество column
 * @method     ChildмобилизацияпомесяцамQuery orderByпландоставкаколичество($order = Criteria::ASC) Order by the План_доставка_количество column
 * @method     ChildмобилизацияпомесяцамQuery orderByфактдоставкаколичество($order = Criteria::ASC) Order by the Факт_доставка_количество column
 * @method     ChildмобилизацияпомесяцамQuery orderByпроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildмобилизацияпомесяцамQuery orderByгод($order = Criteria::ASC) Order by the Год column
 * @method     ChildмобилизацияпомесяцамQuery orderByмесяц($order = Criteria::ASC) Order by the Месяц column
 * @method     ChildмобилизацияпомесяцамQuery orderByдатаотчёта($order = Criteria::ASC) Order by the Дата_отчёта column
 * @method     ChildмобилизацияпомесяцамQuery orderByучастокработ($order = Criteria::ASC) Order by the Участок_работ column
 *
 * @method     ChildмобилизацияпомесяцамQuery groupById() Group by the id column
 * @method     ChildмобилизацияпомесяцамQuery groupByтиптехники() Group by the Тип_техники column
 * @method     ChildмобилизацияпомесяцамQuery groupByпланотгрузкаколичество() Group by the План_отгрузка_количество column
 * @method     ChildмобилизацияпомесяцамQuery groupByфактотгрузкаколичество() Group by the Факт_отгрузка_количество column
 * @method     ChildмобилизацияпомесяцамQuery groupByпландоставкаколичество() Group by the План_доставка_количество column
 * @method     ChildмобилизацияпомесяцамQuery groupByфактдоставкаколичество() Group by the Факт_доставка_количество column
 * @method     ChildмобилизацияпомесяцамQuery groupByпроект() Group by the Проект column
 * @method     ChildмобилизацияпомесяцамQuery groupByгод() Group by the Год column
 * @method     ChildмобилизацияпомесяцамQuery groupByмесяц() Group by the Месяц column
 * @method     ChildмобилизацияпомесяцамQuery groupByдатаотчёта() Group by the Дата_отчёта column
 * @method     ChildмобилизацияпомесяцамQuery groupByучастокработ() Group by the Участок_работ column
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildмобилизацияпомесяцамQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildмобилизацияпомесяцамQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildмобилизацияпомесяцамQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildмобилизацияпомесяцамQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinучасткиработмобилизация($relationAlias = null) Adds a LEFT JOIN clause to the query using the участкиработмобилизация relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinучасткиработмобилизация($relationAlias = null) Adds a RIGHT JOIN clause to the query using the участкиработмобилизация relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinучасткиработмобилизация($relationAlias = null) Adds a INNER JOIN clause to the query using the участкиработмобилизация relation
 *
 * @method     ChildмобилизацияпомесяцамQuery joinWithучасткиработмобилизация($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the участкиработмобилизация relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinWithучасткиработмобилизация() Adds a LEFT JOIN clause and with to the query using the участкиработмобилизация relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinWithучасткиработмобилизация() Adds a RIGHT JOIN clause and with to the query using the участкиработмобилизация relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinWithучасткиработмобилизация() Adds a INNER JOIN clause and with to the query using the участкиработмобилизация relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinКалендарь($relationAlias = null) Adds a LEFT JOIN clause to the query using the Календарь relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinКалендарь($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Календарь relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinКалендарь($relationAlias = null) Adds a INNER JOIN clause to the query using the Календарь relation
 *
 * @method     ChildмобилизацияпомесяцамQuery joinWithКалендарь($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Календарь relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinWithКалендарь() Adds a LEFT JOIN clause and with to the query using the Календарь relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinWithКалендарь() Adds a RIGHT JOIN clause and with to the query using the Календарь relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinWithКалендарь() Adds a INNER JOIN clause and with to the query using the Календарь relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinтипытехникимобилизация($relationAlias = null) Adds a LEFT JOIN clause to the query using the типытехникимобилизация relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinтипытехникимобилизация($relationAlias = null) Adds a RIGHT JOIN clause to the query using the типытехникимобилизация relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinтипытехникимобилизация($relationAlias = null) Adds a INNER JOIN clause to the query using the типытехникимобилизация relation
 *
 * @method     ChildмобилизацияпомесяцамQuery joinWithтипытехникимобилизация($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the типытехникимобилизация relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinWithтипытехникимобилизация() Adds a LEFT JOIN clause and with to the query using the типытехникимобилизация relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinWithтипытехникимобилизация() Adds a RIGHT JOIN clause and with to the query using the типытехникимобилизация relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinWithтипытехникимобилизация() Adds a INNER JOIN clause and with to the query using the типытехникимобилизация relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinгода($relationAlias = null) Adds a LEFT JOIN clause to the query using the года relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinгода($relationAlias = null) Adds a RIGHT JOIN clause to the query using the года relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinгода($relationAlias = null) Adds a INNER JOIN clause to the query using the года relation
 *
 * @method     ChildмобилизацияпомесяцамQuery joinWithгода($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the года relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinWithгода() Adds a LEFT JOIN clause and with to the query using the года relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinWithгода() Adds a RIGHT JOIN clause and with to the query using the года relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinWithгода() Adds a INNER JOIN clause and with to the query using the года relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinмесяца($relationAlias = null) Adds a LEFT JOIN clause to the query using the месяца relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinмесяца($relationAlias = null) Adds a RIGHT JOIN clause to the query using the месяца relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinмесяца($relationAlias = null) Adds a INNER JOIN clause to the query using the месяца relation
 *
 * @method     ChildмобилизацияпомесяцамQuery joinWithмесяца($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the месяца relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinWithмесяца() Adds a LEFT JOIN clause and with to the query using the месяца relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinWithмесяца() Adds a RIGHT JOIN clause and with to the query using the месяца relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinWithмесяца() Adds a INNER JOIN clause and with to the query using the месяца relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinПроекты($relationAlias = null) Adds a LEFT JOIN clause to the query using the Проекты relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinПроекты($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Проекты relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinПроекты($relationAlias = null) Adds a INNER JOIN clause to the query using the Проекты relation
 *
 * @method     ChildмобилизацияпомесяцамQuery joinWithПроекты($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Проекты relation
 *
 * @method     ChildмобилизацияпомесяцамQuery leftJoinWithПроекты() Adds a LEFT JOIN clause and with to the query using the Проекты relation
 * @method     ChildмобилизацияпомесяцамQuery rightJoinWithПроекты() Adds a RIGHT JOIN clause and with to the query using the Проекты relation
 * @method     ChildмобилизацияпомесяцамQuery innerJoinWithПроекты() Adds a INNER JOIN clause and with to the query using the Проекты relation
 *
 * @method     \участкиработмобилизацияQuery|\КалендарьQuery|\типытехникимобилизацияQuery|\годаQuery|\месяцаQuery|\ПроектыQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childмобилизацияпомесяцам findOne(ConnectionInterface $con = null) Return the first Childмобилизацияпомесяцам matching the query
 * @method     Childмобилизацияпомесяцам findOneOrCreate(ConnectionInterface $con = null) Return the first Childмобилизацияпомесяцам matching the query, or a new Childмобилизацияпомесяцам object populated from the query conditions when no match is found
 *
 * @method     Childмобилизацияпомесяцам findOneById(int $id) Return the first Childмобилизацияпомесяцам filtered by the id column
 * @method     Childмобилизацияпомесяцам findOneByтиптехники(int $Тип_техники) Return the first Childмобилизацияпомесяцам filtered by the Тип_техники column
 * @method     Childмобилизацияпомесяцам findOneByпланотгрузкаколичество(int $План_отгрузка_количество) Return the first Childмобилизацияпомесяцам filtered by the План_отгрузка_количество column
 * @method     Childмобилизацияпомесяцам findOneByфактотгрузкаколичество(int $Факт_отгрузка_количество) Return the first Childмобилизацияпомесяцам filtered by the Факт_отгрузка_количество column
 * @method     Childмобилизацияпомесяцам findOneByпландоставкаколичество(int $План_доставка_количество) Return the first Childмобилизацияпомесяцам filtered by the План_доставка_количество column
 * @method     Childмобилизацияпомесяцам findOneByфактдоставкаколичество(int $Факт_доставка_количество) Return the first Childмобилизацияпомесяцам filtered by the Факт_доставка_количество column
 * @method     Childмобилизацияпомесяцам findOneByпроект(int $Проект) Return the first Childмобилизацияпомесяцам filtered by the Проект column
 * @method     Childмобилизацияпомесяцам findOneByгод(int $Год) Return the first Childмобилизацияпомесяцам filtered by the Год column
 * @method     Childмобилизацияпомесяцам findOneByмесяц(int $Месяц) Return the first Childмобилизацияпомесяцам filtered by the Месяц column
 * @method     Childмобилизацияпомесяцам findOneByдатаотчёта(string $Дата_отчёта) Return the first Childмобилизацияпомесяцам filtered by the Дата_отчёта column
 * @method     Childмобилизацияпомесяцам findOneByучастокработ(int $Участок_работ) Return the first Childмобилизацияпомесяцам filtered by the Участок_работ column *

 * @method     Childмобилизацияпомесяцам requirePk($key, ConnectionInterface $con = null) Return the Childмобилизацияпомесяцам by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOne(ConnectionInterface $con = null) Return the first Childмобилизацияпомесяцам matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childмобилизацияпомесяцам requireOneById(int $id) Return the first Childмобилизацияпомесяцам filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByтиптехники(int $Тип_техники) Return the first Childмобилизацияпомесяцам filtered by the Тип_техники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByпланотгрузкаколичество(int $План_отгрузка_количество) Return the first Childмобилизацияпомесяцам filtered by the План_отгрузка_количество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByфактотгрузкаколичество(int $Факт_отгрузка_количество) Return the first Childмобилизацияпомесяцам filtered by the Факт_отгрузка_количество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByпландоставкаколичество(int $План_доставка_количество) Return the first Childмобилизацияпомесяцам filtered by the План_доставка_количество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByфактдоставкаколичество(int $Факт_доставка_количество) Return the first Childмобилизацияпомесяцам filtered by the Факт_доставка_количество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByпроект(int $Проект) Return the first Childмобилизацияпомесяцам filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByгод(int $Год) Return the first Childмобилизацияпомесяцам filtered by the Год column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByмесяц(int $Месяц) Return the first Childмобилизацияпомесяцам filtered by the Месяц column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByдатаотчёта(string $Дата_отчёта) Return the first Childмобилизацияпомесяцам filtered by the Дата_отчёта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизацияпомесяцам requireOneByучастокработ(int $Участок_работ) Return the first Childмобилизацияпомесяцам filtered by the Участок_работ column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection find(ConnectionInterface $con = null) Return Childмобилизацияпомесяцам objects based on current ModelCriteria
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findById(int $id) Return Childмобилизацияпомесяцам objects filtered by the id column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByтиптехники(int $Тип_техники) Return Childмобилизацияпомесяцам objects filtered by the Тип_техники column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByпланотгрузкаколичество(int $План_отгрузка_количество) Return Childмобилизацияпомесяцам objects filtered by the План_отгрузка_количество column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByфактотгрузкаколичество(int $Факт_отгрузка_количество) Return Childмобилизацияпомесяцам objects filtered by the Факт_отгрузка_количество column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByпландоставкаколичество(int $План_доставка_количество) Return Childмобилизацияпомесяцам objects filtered by the План_доставка_количество column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByфактдоставкаколичество(int $Факт_доставка_количество) Return Childмобилизацияпомесяцам objects filtered by the Факт_доставка_количество column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByпроект(int $Проект) Return Childмобилизацияпомесяцам objects filtered by the Проект column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByгод(int $Год) Return Childмобилизацияпомесяцам objects filtered by the Год column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByмесяц(int $Месяц) Return Childмобилизацияпомесяцам objects filtered by the Месяц column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByдатаотчёта(string $Дата_отчёта) Return Childмобилизацияпомесяцам objects filtered by the Дата_отчёта column
 * @method     Childмобилизацияпомесяцам[]|ObjectCollection findByучастокработ(int $Участок_работ) Return Childмобилизацияпомесяцам objects filtered by the Участок_работ column
 * @method     Childмобилизацияпомесяцам[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class мобилизацияпомесяцамQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\мобилизацияпомесяцамQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\мобилизацияпомесяцам', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildмобилизацияпомесяцамQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildмобилизацияпомесяцамQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildмобилизацияпомесяцамQuery) {
            return $criteria;
        }
        $query = new ChildмобилизацияпомесяцамQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Childмобилизацияпомесяцам|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = мобилизацияпомесяцамTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(мобилизацияпомесяцамTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return Childмобилизацияпомесяцам A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Тип_техники, План_отгрузка_количество, Факт_отгрузка_количество, План_доставка_количество, Факт_доставка_количество, Проект, Год, Месяц, Дата_отчёта, Участок_работ FROM Мобилизация_по_месяцам WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var Childмобилизацияпомесяцам $obj */
            $obj = new Childмобилизацияпомесяцам();
            $obj->hydrate($row);
            мобилизацияпомесяцамTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return Childмобилизацияпомесяцам|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Тип_техники column
     *
     * Example usage:
     * <code>
     * $query->filterByтиптехники(1234); // WHERE Тип_техники = 1234
     * $query->filterByтиптехники(array(12, 34)); // WHERE Тип_техники IN (12, 34)
     * $query->filterByтиптехники(array('min' => 12)); // WHERE Тип_техники > 12
     * </code>
     *
     * @see       filterByтипытехникимобилизация()
     *
     * @param     mixed $�иптехники The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByтиптехники($�иптехники = null, $comparison = null)
    {
        if (is_array($�иптехники)) {
            $useMinMax = false;
            if (isset($�иптехники['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ТИП_ТЕХНИКИ, $�иптехники['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�иптехники['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ТИП_ТЕХНИКИ, $�иптехники['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ТИП_ТЕХНИКИ, $�иптехники, $comparison);
    }

    /**
     * Filter the query on the План_отгрузка_количество column
     *
     * Example usage:
     * <code>
     * $query->filterByпланотгрузкаколичество(1234); // WHERE План_отгрузка_количество = 1234
     * $query->filterByпланотгрузкаколичество(array(12, 34)); // WHERE План_отгрузка_количество IN (12, 34)
     * $query->filterByпланотгрузкаколичество(array('min' => 12)); // WHERE План_отгрузка_количество > 12
     * </code>
     *
     * @param     mixed $�ланотгрузкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByпланотгрузкаколичество($�ланотгрузкаколичество = null, $comparison = null)
    {
        if (is_array($�ланотгрузкаколичество)) {
            $useMinMax = false;
            if (isset($�ланотгрузкаколичество['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО, $�ланотгрузкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ланотгрузкаколичество['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО, $�ланотгрузкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО, $�ланотгрузкаколичество, $comparison);
    }

    /**
     * Filter the query on the Факт_отгрузка_количество column
     *
     * Example usage:
     * <code>
     * $query->filterByфактотгрузкаколичество(1234); // WHERE Факт_отгрузка_количество = 1234
     * $query->filterByфактотгрузкаколичество(array(12, 34)); // WHERE Факт_отгрузка_количество IN (12, 34)
     * $query->filterByфактотгрузкаколичество(array('min' => 12)); // WHERE Факт_отгрузка_количество > 12
     * </code>
     *
     * @param     mixed $�актотгрузкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByфактотгрузкаколичество($�актотгрузкаколичество = null, $comparison = null)
    {
        if (is_array($�актотгрузкаколичество)) {
            $useMinMax = false;
            if (isset($�актотгрузкаколичество['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО, $�актотгрузкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актотгрузкаколичество['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО, $�актотгрузкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО, $�актотгрузкаколичество, $comparison);
    }

    /**
     * Filter the query on the План_доставка_количество column
     *
     * Example usage:
     * <code>
     * $query->filterByпландоставкаколичество(1234); // WHERE План_доставка_количество = 1234
     * $query->filterByпландоставкаколичество(array(12, 34)); // WHERE План_доставка_количество IN (12, 34)
     * $query->filterByпландоставкаколичество(array('min' => 12)); // WHERE План_доставка_количество > 12
     * </code>
     *
     * @param     mixed $�ландоставкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByпландоставкаколичество($�ландоставкаколичество = null, $comparison = null)
    {
        if (is_array($�ландоставкаколичество)) {
            $useMinMax = false;
            if (isset($�ландоставкаколичество['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО, $�ландоставкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ландоставкаколичество['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО, $�ландоставкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО, $�ландоставкаколичество, $comparison);
    }

    /**
     * Filter the query on the Факт_доставка_количество column
     *
     * Example usage:
     * <code>
     * $query->filterByфактдоставкаколичество(1234); // WHERE Факт_доставка_количество = 1234
     * $query->filterByфактдоставкаколичество(array(12, 34)); // WHERE Факт_доставка_количество IN (12, 34)
     * $query->filterByфактдоставкаколичество(array('min' => 12)); // WHERE Факт_доставка_количество > 12
     * </code>
     *
     * @param     mixed $�актдоставкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByфактдоставкаколичество($�актдоставкаколичество = null, $comparison = null)
    {
        if (is_array($�актдоставкаколичество)) {
            $useMinMax = false;
            if (isset($�актдоставкаколичество['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО, $�актдоставкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актдоставкаколичество['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО, $�актдоставкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО, $�актдоставкаколичество, $comparison);
    }

    /**
     * Filter the query on the Проект column
     *
     * Example usage:
     * <code>
     * $query->filterByпроект(1234); // WHERE Проект = 1234
     * $query->filterByпроект(array(12, 34)); // WHERE Проект IN (12, 34)
     * $query->filterByпроект(array('min' => 12)); // WHERE Проект > 12
     * </code>
     *
     * @see       filterByПроекты()
     *
     * @param     mixed $�роект The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByпроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query on the Год column
     *
     * Example usage:
     * <code>
     * $query->filterByгод(1234); // WHERE Год = 1234
     * $query->filterByгод(array(12, 34)); // WHERE Год IN (12, 34)
     * $query->filterByгод(array('min' => 12)); // WHERE Год > 12
     * </code>
     *
     * @see       filterByгода()
     *
     * @param     mixed $�од The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByгод($�од = null, $comparison = null)
    {
        if (is_array($�од)) {
            $useMinMax = false;
            if (isset($�од['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ГОД, $�од['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�од['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ГОД, $�од['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ГОД, $�од, $comparison);
    }

    /**
     * Filter the query on the Месяц column
     *
     * Example usage:
     * <code>
     * $query->filterByмесяц(1234); // WHERE Месяц = 1234
     * $query->filterByмесяц(array(12, 34)); // WHERE Месяц IN (12, 34)
     * $query->filterByмесяц(array('min' => 12)); // WHERE Месяц > 12
     * </code>
     *
     * @see       filterByмесяца()
     *
     * @param     mixed $�есяц The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByмесяц($�есяц = null, $comparison = null)
    {
        if (is_array($�есяц)) {
            $useMinMax = false;
            if (isset($�есяц['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_МЕСЯЦ, $�есяц['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�есяц['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_МЕСЯЦ, $�есяц['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_МЕСЯЦ, $�есяц, $comparison);
    }

    /**
     * Filter the query on the Дата_отчёта column
     *
     * Example usage:
     * <code>
     * $query->filterByдатаотчёта('2011-03-14'); // WHERE Дата_отчёта = '2011-03-14'
     * $query->filterByдатаотчёта('now'); // WHERE Дата_отчёта = '2011-03-14'
     * $query->filterByдатаотчёта(array('max' => 'yesterday')); // WHERE Дата_отчёта > '2011-03-13'
     * </code>
     *
     * @param     mixed $�атаотчёта The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByдатаотчёта($�атаотчёта = null, $comparison = null)
    {
        if (is_array($�атаотчёта)) {
            $useMinMax = false;
            if (isset($�атаотчёта['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ДАТА_ОТЧЁТА, $�атаотчёта['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�атаотчёта['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ДАТА_ОТЧЁТА, $�атаотчёта['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ДАТА_ОТЧЁТА, $�атаотчёта, $comparison);
    }

    /**
     * Filter the query on the Участок_работ column
     *
     * Example usage:
     * <code>
     * $query->filterByучастокработ(1234); // WHERE Участок_работ = 1234
     * $query->filterByучастокработ(array(12, 34)); // WHERE Участок_работ IN (12, 34)
     * $query->filterByучастокработ(array('min' => 12)); // WHERE Участок_работ > 12
     * </code>
     *
     * @see       filterByучасткиработмобилизация()
     *
     * @param     mixed $�частокработ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByучастокработ($�частокработ = null, $comparison = null)
    {
        if (is_array($�частокработ)) {
            $useMinMax = false;
            if (isset($�частокработ['min'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�частокработ['max'])) {
                $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ, $comparison);
    }

    /**
     * Filter the query by a related \участкиработмобилизация object
     *
     * @param \участкиработмобилизация|ObjectCollection $�часткиработмобилизация The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByучасткиработмобилизация($�часткиработмобилизация, $comparison = null)
    {
        if ($�часткиработмобилизация instanceof \участкиработмобилизация) {
            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_УЧАСТОК_РАБОТ, $�часткиработмобилизация->getId(), $comparison);
        } elseif ($�часткиработмобилизация instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_УЧАСТОК_РАБОТ, $�часткиработмобилизация->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByучасткиработмобилизация() only accepts arguments of type \участкиработмобилизация or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the участкиработмобилизация relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function joinучасткиработмобилизация($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('участкиработмобилизация');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'участкиработмобилизация');
        }

        return $this;
    }

    /**
     * Use the участкиработмобилизация relation участкиработмобилизация object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \участкиработмобилизацияQuery A secondary query class using the current class as primary query
     */
    public function useучасткиработмобилизацияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinучасткиработмобилизация($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'участкиработмобилизация', '\участкиработмобилизацияQuery');
    }

    /**
     * Filter the query by a related \Календарь object
     *
     * @param \Календарь|ObjectCollection $�алендарь The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByКалендарь($�алендарь, $comparison = null)
    {
        if ($�алендарь instanceof \Календарь) {
            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ДАТА_ОТЧЁТА, $�алендарь->getдата(), $comparison);
        } elseif ($�алендарь instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ДАТА_ОТЧЁТА, $�алендарь->toKeyValue('PrimaryKey', 'дата'), $comparison);
        } else {
            throw new PropelException('filterByКалендарь() only accepts arguments of type \Календарь or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Календарь relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function joinКалендарь($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Календарь');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Календарь');
        }

        return $this;
    }

    /**
     * Use the Календарь relation Календарь object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \КалендарьQuery A secondary query class using the current class as primary query
     */
    public function useКалендарьQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinКалендарь($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Календарь', '\КалендарьQuery');
    }

    /**
     * Filter the query by a related \типытехникимобилизация object
     *
     * @param \типытехникимобилизация|ObjectCollection $�ипытехникимобилизация The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByтипытехникимобилизация($�ипытехникимобилизация, $comparison = null)
    {
        if ($�ипытехникимобилизация instanceof \типытехникимобилизация) {
            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ТИП_ТЕХНИКИ, $�ипытехникимобилизация->getId(), $comparison);
        } elseif ($�ипытехникимобилизация instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ТИП_ТЕХНИКИ, $�ипытехникимобилизация->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByтипытехникимобилизация() only accepts arguments of type \типытехникимобилизация or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the типытехникимобилизация relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function joinтипытехникимобилизация($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('типытехникимобилизация');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'типытехникимобилизация');
        }

        return $this;
    }

    /**
     * Use the типытехникимобилизация relation типытехникимобилизация object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \типытехникимобилизацияQuery A secondary query class using the current class as primary query
     */
    public function useтипытехникимобилизацияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinтипытехникимобилизация($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'типытехникимобилизация', '\типытехникимобилизацияQuery');
    }

    /**
     * Filter the query by a related \года object
     *
     * @param \года|ObjectCollection $�ода The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByгода($�ода, $comparison = null)
    {
        if ($�ода instanceof \года) {
            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ГОД, $�ода->getId(), $comparison);
        } elseif ($�ода instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ГОД, $�ода->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByгода() only accepts arguments of type \года or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the года relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function joinгода($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('года');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'года');
        }

        return $this;
    }

    /**
     * Use the года relation года object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \годаQuery A secondary query class using the current class as primary query
     */
    public function useгодаQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinгода($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'года', '\годаQuery');
    }

    /**
     * Filter the query by a related \месяца object
     *
     * @param \месяца|ObjectCollection $�есяца The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByмесяца($�есяца, $comparison = null)
    {
        if ($�есяца instanceof \месяца) {
            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_МЕСЯЦ, $�есяца->getId(), $comparison);
        } elseif ($�есяца instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_МЕСЯЦ, $�есяца->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByмесяца() only accepts arguments of type \месяца or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the месяца relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function joinмесяца($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('месяца');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'месяца');
        }

        return $this;
    }

    /**
     * Use the месяца relation месяца object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \месяцаQuery A secondary query class using the current class as primary query
     */
    public function useмесяцаQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinмесяца($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'месяца', '\месяцаQuery');
    }

    /**
     * Filter the query by a related \Проекты object
     *
     * @param \Проекты|ObjectCollection $�роекты The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByПроекты($�роекты, $comparison = null)
    {
        if ($�роекты instanceof \Проекты) {
            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПРОЕКТ, $�роекты->getId(), $comparison);
        } elseif ($�роекты instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ПРОЕКТ, $�роекты->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByПроекты() only accepts arguments of type \Проекты or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Проекты relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function joinПроекты($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Проекты');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Проекты');
        }

        return $this;
    }

    /**
     * Use the Проекты relation Проекты object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ПроектыQuery A secondary query class using the current class as primary query
     */
    public function useПроектыQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinПроекты($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Проекты', '\ПроектыQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childмобилизацияпомесяцам $�обилизацияпомесяцам Object to remove from the list of results
     *
     * @return $this|ChildмобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function prune($�обилизацияпомесяцам = null)
    {
        if ($�обилизацияпомесяцам) {
            $this->addUsingAlias(мобилизацияпомесяцамTableMap::COL_ID, $�обилизацияпомесяцам->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Мобилизация_по_месяцам table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(мобилизацияпомесяцамTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            мобилизацияпомесяцамTableMap::clearInstancePool();
            мобилизацияпомесяцамTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(мобилизацияпомесяцамTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(мобилизацияпомесяцамTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            мобилизацияпомесяцамTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            мобилизацияпомесяцамTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // мобилизацияпомесяцамQuery
