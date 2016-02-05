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
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Проекты' table.
 *
 * 
 *
 * @method     ChildПроектыQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildПроектыQuery orderByкодпроекта($order = Criteria::ASC) Order by the Код_проекта column
 * @method     ChildПроектыQuery orderByпроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildПроектыQuery orderByруководитель($order = Criteria::ASC) Order by the Руководитель column
 * @method     ChildПроектыQuery orderByзаказчик($order = Criteria::ASC) Order by the Заказчик column
 * @method     ChildПроектыQuery orderByподрядчики($order = Criteria::ASC) Order by the Подрядчики column
 * @method     ChildПроектыQuery orderByпериодвыполненияработ($order = Criteria::ASC) Order by the Период_выполнения_работ column
 * @method     ChildПроектыQuery orderByдеталипроекта($order = Criteria::ASC) Order by the Детали_проекта column
 * @method     ChildПроектыQuery orderByтипстроительства($order = Criteria::ASC) Order by the Тип_строительства column
 * @method     ChildПроектыQuery orderByназваниепапкипроекта($order = Criteria::ASC) Order by the Название_папки_проекта column
 * @method     ChildПроектыQuery orderByкартинка($order = Criteria::ASC) Order by the Картинка column
 * @method     ChildПроектыQuery orderByкарточкапроекта($order = Criteria::ASC) Order by the Карточка_проекта column
 *
 * @method     ChildПроектыQuery groupById() Group by the id column
 * @method     ChildПроектыQuery groupByкодпроекта() Group by the Код_проекта column
 * @method     ChildПроектыQuery groupByпроект() Group by the Проект column
 * @method     ChildПроектыQuery groupByруководитель() Group by the Руководитель column
 * @method     ChildПроектыQuery groupByзаказчик() Group by the Заказчик column
 * @method     ChildПроектыQuery groupByподрядчики() Group by the Подрядчики column
 * @method     ChildПроектыQuery groupByпериодвыполненияработ() Group by the Период_выполнения_работ column
 * @method     ChildПроектыQuery groupByдеталипроекта() Group by the Детали_проекта column
 * @method     ChildПроектыQuery groupByтипстроительства() Group by the Тип_строительства column
 * @method     ChildПроектыQuery groupByназваниепапкипроекта() Group by the Название_папки_проекта column
 * @method     ChildПроектыQuery groupByкартинка() Group by the Картинка column
 * @method     ChildПроектыQuery groupByкарточкапроекта() Group by the Карточка_проекта column
 *
 * @method     ChildПроектыQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildПроектыQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildПроектыQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildПроектыQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildПроектыQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildПроектыQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildПроектыQuery leftJoinдатыобновленийдашбордов($relationAlias = null) Adds a LEFT JOIN clause to the query using the датыобновленийдашбордов relation
 * @method     ChildПроектыQuery rightJoinдатыобновленийдашбордов($relationAlias = null) Adds a RIGHT JOIN clause to the query using the датыобновленийдашбордов relation
 * @method     ChildПроектыQuery innerJoinдатыобновленийдашбордов($relationAlias = null) Adds a INNER JOIN clause to the query using the датыобновленийдашбордов relation
 *
 * @method     ChildПроектыQuery joinWithдатыобновленийдашбордов($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the датыобновленийдашбордов relation
 *
 * @method     ChildПроектыQuery leftJoinWithдатыобновленийдашбордов() Adds a LEFT JOIN clause and with to the query using the датыобновленийдашбордов relation
 * @method     ChildПроектыQuery rightJoinWithдатыобновленийдашбордов() Adds a RIGHT JOIN clause and with to the query using the датыобновленийдашбордов relation
 * @method     ChildПроектыQuery innerJoinWithдатыобновленийдашбордов() Adds a INNER JOIN clause and with to the query using the датыобновленийдашбордов relation
 *
 * @method     ChildПроектыQuery leftJoinмтр($relationAlias = null) Adds a LEFT JOIN clause to the query using the мтр relation
 * @method     ChildПроектыQuery rightJoinмтр($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мтр relation
 * @method     ChildПроектыQuery innerJoinмтр($relationAlias = null) Adds a INNER JOIN clause to the query using the мтр relation
 *
 * @method     ChildПроектыQuery joinWithмтр($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мтр relation
 *
 * @method     ChildПроектыQuery leftJoinWithмтр() Adds a LEFT JOIN clause and with to the query using the мтр relation
 * @method     ChildПроектыQuery rightJoinWithмтр() Adds a RIGHT JOIN clause and with to the query using the мтр relation
 * @method     ChildПроектыQuery innerJoinWithмтр() Adds a INNER JOIN clause and with to the query using the мтр relation
 *
 * @method     ChildПроектыQuery leftJoinмобилизация($relationAlias = null) Adds a LEFT JOIN clause to the query using the мобилизация relation
 * @method     ChildПроектыQuery rightJoinмобилизация($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мобилизация relation
 * @method     ChildПроектыQuery innerJoinмобилизация($relationAlias = null) Adds a INNER JOIN clause to the query using the мобилизация relation
 *
 * @method     ChildПроектыQuery joinWithмобилизация($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мобилизация relation
 *
 * @method     ChildПроектыQuery leftJoinWithмобилизация() Adds a LEFT JOIN clause and with to the query using the мобилизация relation
 * @method     ChildПроектыQuery rightJoinWithмобилизация() Adds a RIGHT JOIN clause and with to the query using the мобилизация relation
 * @method     ChildПроектыQuery innerJoinWithмобилизация() Adds a INNER JOIN clause and with to the query using the мобилизация relation
 *
 * @method     ChildПроектыQuery leftJoinмобилизацияпомесяцам($relationAlias = null) Adds a LEFT JOIN clause to the query using the мобилизацияпомесяцам relation
 * @method     ChildПроектыQuery rightJoinмобилизацияпомесяцам($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мобилизацияпомесяцам relation
 * @method     ChildПроектыQuery innerJoinмобилизацияпомесяцам($relationAlias = null) Adds a INNER JOIN clause to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildПроектыQuery joinWithмобилизацияпомесяцам($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildПроектыQuery leftJoinWithмобилизацияпомесяцам() Adds a LEFT JOIN clause and with to the query using the мобилизацияпомесяцам relation
 * @method     ChildПроектыQuery rightJoinWithмобилизацияпомесяцам() Adds a RIGHT JOIN clause and with to the query using the мобилизацияпомесяцам relation
 * @method     ChildПроектыQuery innerJoinWithмобилизацияпомесяцам() Adds a INNER JOIN clause and with to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildПроектыQuery leftJoinПредписания($relationAlias = null) Adds a LEFT JOIN clause to the query using the Предписания relation
 * @method     ChildПроектыQuery rightJoinПредписания($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Предписания relation
 * @method     ChildПроектыQuery innerJoinПредписания($relationAlias = null) Adds a INNER JOIN clause to the query using the Предписания relation
 *
 * @method     ChildПроектыQuery joinWithПредписания($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Предписания relation
 *
 * @method     ChildПроектыQuery leftJoinWithПредписания() Adds a LEFT JOIN clause and with to the query using the Предписания relation
 * @method     ChildПроектыQuery rightJoinWithПредписания() Adds a RIGHT JOIN clause and with to the query using the Предписания relation
 * @method     ChildПроектыQuery innerJoinWithПредписания() Adds a INNER JOIN clause and with to the query using the Предписания relation
 *
 * @method     ChildПроектыQuery leftJoinпроблемныевопросы($relationAlias = null) Adds a LEFT JOIN clause to the query using the проблемныевопросы relation
 * @method     ChildПроектыQuery rightJoinпроблемныевопросы($relationAlias = null) Adds a RIGHT JOIN clause to the query using the проблемныевопросы relation
 * @method     ChildПроектыQuery innerJoinпроблемныевопросы($relationAlias = null) Adds a INNER JOIN clause to the query using the проблемныевопросы relation
 *
 * @method     ChildПроектыQuery joinWithпроблемныевопросы($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the проблемныевопросы relation
 *
 * @method     ChildПроектыQuery leftJoinWithпроблемныевопросы() Adds a LEFT JOIN clause and with to the query using the проблемныевопросы relation
 * @method     ChildПроектыQuery rightJoinWithпроблемныевопросы() Adds a RIGHT JOIN clause and with to the query using the проблемныевопросы relation
 * @method     ChildПроектыQuery innerJoinWithпроблемныевопросы() Adds a INNER JOIN clause and with to the query using the проблемныевопросы relation
 *
 * @method     ChildПроектыQuery leftJoinпрограммы($relationAlias = null) Adds a LEFT JOIN clause to the query using the программы relation
 * @method     ChildПроектыQuery rightJoinпрограммы($relationAlias = null) Adds a RIGHT JOIN clause to the query using the программы relation
 * @method     ChildПроектыQuery innerJoinпрограммы($relationAlias = null) Adds a INNER JOIN clause to the query using the программы relation
 *
 * @method     ChildПроектыQuery joinWithпрограммы($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the программы relation
 *
 * @method     ChildПроектыQuery leftJoinWithпрограммы() Adds a LEFT JOIN clause and with to the query using the программы relation
 * @method     ChildПроектыQuery rightJoinWithпрограммы() Adds a RIGHT JOIN clause and with to the query using the программы relation
 * @method     ChildПроектыQuery innerJoinWithпрограммы() Adds a INNER JOIN clause and with to the query using the программы relation
 *
 * @method     ChildПроектыQuery leftJoinучасткиработ($relationAlias = null) Adds a LEFT JOIN clause to the query using the участкиработ relation
 * @method     ChildПроектыQuery rightJoinучасткиработ($relationAlias = null) Adds a RIGHT JOIN clause to the query using the участкиработ relation
 * @method     ChildПроектыQuery innerJoinучасткиработ($relationAlias = null) Adds a INNER JOIN clause to the query using the участкиработ relation
 *
 * @method     ChildПроектыQuery joinWithучасткиработ($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the участкиработ relation
 *
 * @method     ChildПроектыQuery leftJoinWithучасткиработ() Adds a LEFT JOIN clause and with to the query using the участкиработ relation
 * @method     ChildПроектыQuery rightJoinWithучасткиработ() Adds a RIGHT JOIN clause and with to the query using the участкиработ relation
 * @method     ChildПроектыQuery innerJoinWithучасткиработ() Adds a INNER JOIN clause and with to the query using the участкиработ relation
 *
 * @method     \датыобновленийдашбордовQuery|\мтрQuery|\мобилизацияQuery|\мобилизацияпомесяцамQuery|\ПредписанияQuery|\проблемныевопросыQuery|\программыQuery|\участкиработQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildПроекты findOne(ConnectionInterface $con = null) Return the first ChildПроекты matching the query
 * @method     ChildПроекты findOneOrCreate(ConnectionInterface $con = null) Return the first ChildПроекты matching the query, or a new ChildПроекты object populated from the query conditions when no match is found
 *
 * @method     ChildПроекты findOneById(int $id) Return the first ChildПроекты filtered by the id column
 * @method     ChildПроекты findOneByкодпроекта(string $Код_проекта) Return the first ChildПроекты filtered by the Код_проекта column
 * @method     ChildПроекты findOneByпроект(string $Проект) Return the first ChildПроекты filtered by the Проект column
 * @method     ChildПроекты findOneByруководитель(string $Руководитель) Return the first ChildПроекты filtered by the Руководитель column
 * @method     ChildПроекты findOneByзаказчик(string $Заказчик) Return the first ChildПроекты filtered by the Заказчик column
 * @method     ChildПроекты findOneByподрядчики(string $Подрядчики) Return the first ChildПроекты filtered by the Подрядчики column
 * @method     ChildПроекты findOneByпериодвыполненияработ(string $Период_выполнения_работ) Return the first ChildПроекты filtered by the Период_выполнения_работ column
 * @method     ChildПроекты findOneByдеталипроекта(string $Детали_проекта) Return the first ChildПроекты filtered by the Детали_проекта column
 * @method     ChildПроекты findOneByтипстроительства(string $Тип_строительства) Return the first ChildПроекты filtered by the Тип_строительства column
 * @method     ChildПроекты findOneByназваниепапкипроекта(string $Название_папки_проекта) Return the first ChildПроекты filtered by the Название_папки_проекта column
 * @method     ChildПроекты findOneByкартинка(string $Картинка) Return the first ChildПроекты filtered by the Картинка column
 * @method     ChildПроекты findOneByкарточкапроекта(string $Карточка_проекта) Return the first ChildПроекты filtered by the Карточка_проекта column *

 * @method     ChildПроекты requirePk($key, ConnectionInterface $con = null) Return the ChildПроекты by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOne(ConnectionInterface $con = null) Return the first ChildПроекты matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПроекты requireOneById(int $id) Return the first ChildПроекты filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByкодпроекта(string $Код_проекта) Return the first ChildПроекты filtered by the Код_проекта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByпроект(string $Проект) Return the first ChildПроекты filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByруководитель(string $Руководитель) Return the first ChildПроекты filtered by the Руководитель column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByзаказчик(string $Заказчик) Return the first ChildПроекты filtered by the Заказчик column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByподрядчики(string $Подрядчики) Return the first ChildПроекты filtered by the Подрядчики column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByпериодвыполненияработ(string $Период_выполнения_работ) Return the first ChildПроекты filtered by the Период_выполнения_работ column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByдеталипроекта(string $Детали_проекта) Return the first ChildПроекты filtered by the Детали_проекта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByтипстроительства(string $Тип_строительства) Return the first ChildПроекты filtered by the Тип_строительства column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByназваниепапкипроекта(string $Название_папки_проекта) Return the first ChildПроекты filtered by the Название_папки_проекта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByкартинка(string $Картинка) Return the first ChildПроекты filtered by the Картинка column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByкарточкапроекта(string $Карточка_проекта) Return the first ChildПроекты filtered by the Карточка_проекта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПроекты[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildПроекты objects based on current ModelCriteria
 * @method     ChildПроекты[]|ObjectCollection findById(int $id) Return ChildПроекты objects filtered by the id column
 * @method     ChildПроекты[]|ObjectCollection findByкодпроекта(string $Код_проекта) Return ChildПроекты objects filtered by the Код_проекта column
 * @method     ChildПроекты[]|ObjectCollection findByпроект(string $Проект) Return ChildПроекты objects filtered by the Проект column
 * @method     ChildПроекты[]|ObjectCollection findByруководитель(string $Руководитель) Return ChildПроекты objects filtered by the Руководитель column
 * @method     ChildПроекты[]|ObjectCollection findByзаказчик(string $Заказчик) Return ChildПроекты objects filtered by the Заказчик column
 * @method     ChildПроекты[]|ObjectCollection findByподрядчики(string $Подрядчики) Return ChildПроекты objects filtered by the Подрядчики column
 * @method     ChildПроекты[]|ObjectCollection findByпериодвыполненияработ(string $Период_выполнения_работ) Return ChildПроекты objects filtered by the Период_выполнения_работ column
 * @method     ChildПроекты[]|ObjectCollection findByдеталипроекта(string $Детали_проекта) Return ChildПроекты objects filtered by the Детали_проекта column
 * @method     ChildПроекты[]|ObjectCollection findByтипстроительства(string $Тип_строительства) Return ChildПроекты objects filtered by the Тип_строительства column
 * @method     ChildПроекты[]|ObjectCollection findByназваниепапкипроекта(string $Название_папки_проекта) Return ChildПроекты objects filtered by the Название_папки_проекта column
 * @method     ChildПроекты[]|ObjectCollection findByкартинка(string $Картинка) Return ChildПроекты objects filtered by the Картинка column
 * @method     ChildПроекты[]|ObjectCollection findByкарточкапроекта(string $Карточка_проекта) Return ChildПроекты objects filtered by the Карточка_проекта column
 * @method     ChildПроекты[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ПроектыQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ПроектыQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Проекты', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildПроектыQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildПроектыQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildПроектыQuery) {
            return $criteria;
        }
        $query = new ChildПроектыQuery();
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
     * @return ChildПроекты|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ПроектыTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ПроектыTableMap::DATABASE_NAME);
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
     * @return ChildПроекты A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Код_проекта, Проект, Руководитель, Заказчик, Подрядчики, Период_выполнения_работ, Детали_проекта, Тип_строительства, Название_папки_проекта, Картинка, Карточка_проекта FROM Проекты WHERE id = :p0';
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
            /** @var ChildПроекты $obj */
            $obj = new ChildПроекты();
            $obj->hydrate($row);
            ПроектыTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildПроекты|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ПроектыTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ПроектыTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ПроектыTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ПроектыTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Код_проекта column
     *
     * Example usage:
     * <code>
     * $query->filterByкодпроекта('fooValue');   // WHERE Код_проекта = 'fooValue'
     * $query->filterByкодпроекта('%fooValue%'); // WHERE Код_проекта LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�одпроекта The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByкодпроекта($�одпроекта = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�одпроекта)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�одпроекта)) {
                $�одпроекта = str_replace('*', '%', $�одпроекта);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_КОД_ПРОЕКТА, $�одпроекта, $comparison);
    }

    /**
     * Filter the query on the Проект column
     *
     * Example usage:
     * <code>
     * $query->filterByпроект('fooValue');   // WHERE Проект = 'fooValue'
     * $query->filterByпроект('%fooValue%'); // WHERE Проект LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�роект The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByпроект($�роект = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�роект)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�роект)) {
                $�роект = str_replace('*', '%', $�роект);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query on the Руководитель column
     *
     * Example usage:
     * <code>
     * $query->filterByруководитель('fooValue');   // WHERE Руководитель = 'fooValue'
     * $query->filterByруководитель('%fooValue%'); // WHERE Руководитель LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�уководитель The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByруководитель($�уководитель = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�уководитель)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�уководитель)) {
                $�уководитель = str_replace('*', '%', $�уководитель);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_РУКОВОДИТЕЛЬ, $�уководитель, $comparison);
    }

    /**
     * Filter the query on the Заказчик column
     *
     * Example usage:
     * <code>
     * $query->filterByзаказчик('fooValue');   // WHERE Заказчик = 'fooValue'
     * $query->filterByзаказчик('%fooValue%'); // WHERE Заказчик LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�аказчик The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByзаказчик($�аказчик = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�аказчик)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�аказчик)) {
                $�аказчик = str_replace('*', '%', $�аказчик);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ЗАКАЗЧИК, $�аказчик, $comparison);
    }

    /**
     * Filter the query on the Подрядчики column
     *
     * Example usage:
     * <code>
     * $query->filterByподрядчики('fooValue');   // WHERE Подрядчики = 'fooValue'
     * $query->filterByподрядчики('%fooValue%'); // WHERE Подрядчики LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�одрядчики The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByподрядчики($�одрядчики = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�одрядчики)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�одрядчики)) {
                $�одрядчики = str_replace('*', '%', $�одрядчики);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ПОДРЯДЧИКИ, $�одрядчики, $comparison);
    }

    /**
     * Filter the query on the Период_выполнения_работ column
     *
     * Example usage:
     * <code>
     * $query->filterByпериодвыполненияработ('fooValue');   // WHERE Период_выполнения_работ = 'fooValue'
     * $query->filterByпериодвыполненияработ('%fooValue%'); // WHERE Период_выполнения_работ LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ериодвыполненияработ The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByпериодвыполненияработ($�ериодвыполненияработ = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ериодвыполненияработ)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ериодвыполненияработ)) {
                $�ериодвыполненияработ = str_replace('*', '%', $�ериодвыполненияработ);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ПЕРИОД_ВЫПОЛНЕНИЯ_РАБОТ, $�ериодвыполненияработ, $comparison);
    }

    /**
     * Filter the query on the Детали_проекта column
     *
     * Example usage:
     * <code>
     * $query->filterByдеталипроекта('fooValue');   // WHERE Детали_проекта = 'fooValue'
     * $query->filterByдеталипроекта('%fooValue%'); // WHERE Детали_проекта LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�еталипроекта The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByдеталипроекта($�еталипроекта = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�еталипроекта)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�еталипроекта)) {
                $�еталипроекта = str_replace('*', '%', $�еталипроекта);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ДЕТАЛИ_ПРОЕКТА, $�еталипроекта, $comparison);
    }

    /**
     * Filter the query on the Тип_строительства column
     *
     * Example usage:
     * <code>
     * $query->filterByтипстроительства('fooValue');   // WHERE Тип_строительства = 'fooValue'
     * $query->filterByтипстроительства('%fooValue%'); // WHERE Тип_строительства LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ипстроительства The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByтипстроительства($�ипстроительства = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ипстроительства)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ипстроительства)) {
                $�ипстроительства = str_replace('*', '%', $�ипстроительства);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ТИП_СТРОИТЕЛЬСТВА, $�ипстроительства, $comparison);
    }

    /**
     * Filter the query on the Название_папки_проекта column
     *
     * Example usage:
     * <code>
     * $query->filterByназваниепапкипроекта('fooValue');   // WHERE Название_папки_проекта = 'fooValue'
     * $query->filterByназваниепапкипроекта('%fooValue%'); // WHERE Название_папки_проекта LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�азваниепапкипроекта The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByназваниепапкипроекта($�азваниепапкипроекта = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�азваниепапкипроекта)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�азваниепапкипроекта)) {
                $�азваниепапкипроекта = str_replace('*', '%', $�азваниепапкипроекта);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_НАЗВАНИЕ_ПАПКИ_ПРОЕКТА, $�азваниепапкипроекта, $comparison);
    }

    /**
     * Filter the query on the Картинка column
     *
     * Example usage:
     * <code>
     * $query->filterByкартинка('fooValue');   // WHERE Картинка = 'fooValue'
     * $query->filterByкартинка('%fooValue%'); // WHERE Картинка LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�артинка The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByкартинка($�артинка = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�артинка)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�артинка)) {
                $�артинка = str_replace('*', '%', $�артинка);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_КАРТИНКА, $�артинка, $comparison);
    }

    /**
     * Filter the query on the Карточка_проекта column
     *
     * Example usage:
     * <code>
     * $query->filterByкарточкапроекта('fooValue');   // WHERE Карточка_проекта = 'fooValue'
     * $query->filterByкарточкапроекта('%fooValue%'); // WHERE Карточка_проекта LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�арточкапроекта The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByкарточкапроекта($�арточкапроекта = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�арточкапроекта)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�арточкапроекта)) {
                $�арточкапроекта = str_replace('*', '%', $�арточкапроекта);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_КАРТОЧКА_ПРОЕКТА, $�арточкапроекта, $comparison);
    }

    /**
     * Filter the query by a related \датыобновленийдашбордов object
     *
     * @param \датыобновленийдашбордов|ObjectCollection $�атыобновленийдашбордов the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByдатыобновленийдашбордов($�атыобновленийдашбордов, $comparison = null)
    {
        if ($�атыобновленийдашбордов instanceof \датыобновленийдашбордов) {
            return $this
                ->addUsingAlias(ПроектыTableMap::COL_ID, $�атыобновленийдашбордов->getпроект(), $comparison);
        } elseif ($�атыобновленийдашбордов instanceof ObjectCollection) {
            return $this
                ->useдатыобновленийдашбордовQuery()
                ->filterByPrimaryKeys($�атыобновленийдашбордов->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByдатыобновленийдашбордов() only accepts arguments of type \датыобновленийдашбордов or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the датыобновленийдашбордов relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function joinдатыобновленийдашбордов($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('датыобновленийдашбордов');

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
            $this->addJoinObject($join, 'датыобновленийдашбордов');
        }

        return $this;
    }

    /**
     * Use the датыобновленийдашбордов relation датыобновленийдашбордов object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \датыобновленийдашбордовQuery A secondary query class using the current class as primary query
     */
    public function useдатыобновленийдашбордовQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinдатыобновленийдашбордов($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'датыобновленийдашбордов', '\датыобновленийдашбордовQuery');
    }

    /**
     * Filter the query by a related \мтр object
     *
     * @param \мтр|ObjectCollection $�тр the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByмтр($�тр, $comparison = null)
    {
        if ($�тр instanceof \мтр) {
            return $this
                ->addUsingAlias(ПроектыTableMap::COL_ID, $�тр->getпроект(), $comparison);
        } elseif ($�тр instanceof ObjectCollection) {
            return $this
                ->useмтрQuery()
                ->filterByPrimaryKeys($�тр->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByмтр() only accepts arguments of type \мтр or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the мтр relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function joinмтр($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('мтр');

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
            $this->addJoinObject($join, 'мтр');
        }

        return $this;
    }

    /**
     * Use the мтр relation мтр object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \мтрQuery A secondary query class using the current class as primary query
     */
    public function useмтрQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinмтр($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'мтр', '\мтрQuery');
    }

    /**
     * Filter the query by a related \мобилизация object
     *
     * @param \мобилизация|ObjectCollection $�обилизация the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByмобилизация($�обилизация, $comparison = null)
    {
        if ($�обилизация instanceof \мобилизация) {
            return $this
                ->addUsingAlias(ПроектыTableMap::COL_ID, $�обилизация->getпроект(), $comparison);
        } elseif ($�обилизация instanceof ObjectCollection) {
            return $this
                ->useмобилизацияQuery()
                ->filterByPrimaryKeys($�обилизация->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByмобилизация() only accepts arguments of type \мобилизация or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the мобилизация relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function joinмобилизация($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('мобилизация');

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
            $this->addJoinObject($join, 'мобилизация');
        }

        return $this;
    }

    /**
     * Use the мобилизация relation мобилизация object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \мобилизацияQuery A secondary query class using the current class as primary query
     */
    public function useмобилизацияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinмобилизация($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'мобилизация', '\мобилизацияQuery');
    }

    /**
     * Filter the query by a related \мобилизацияпомесяцам object
     *
     * @param \мобилизацияпомесяцам|ObjectCollection $�обилизацияпомесяцам the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByмобилизацияпомесяцам($�обилизацияпомесяцам, $comparison = null)
    {
        if ($�обилизацияпомесяцам instanceof \мобилизацияпомесяцам) {
            return $this
                ->addUsingAlias(ПроектыTableMap::COL_ID, $�обилизацияпомесяцам->getпроект(), $comparison);
        } elseif ($�обилизацияпомесяцам instanceof ObjectCollection) {
            return $this
                ->useмобилизацияпомесяцамQuery()
                ->filterByPrimaryKeys($�обилизацияпомесяцам->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByмобилизацияпомесяцам() only accepts arguments of type \мобилизацияпомесяцам or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the мобилизацияпомесяцам relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function joinмобилизацияпомесяцам($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('мобилизацияпомесяцам');

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
            $this->addJoinObject($join, 'мобилизацияпомесяцам');
        }

        return $this;
    }

    /**
     * Use the мобилизацияпомесяцам relation мобилизацияпомесяцам object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \мобилизацияпомесяцамQuery A secondary query class using the current class as primary query
     */
    public function useмобилизацияпомесяцамQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinмобилизацияпомесяцам($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'мобилизацияпомесяцам', '\мобилизацияпомесяцамQuery');
    }

    /**
     * Filter the query by a related \Предписания object
     *
     * @param \Предписания|ObjectCollection $�редписания the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByПредписания($�редписания, $comparison = null)
    {
        if ($�редписания instanceof \Предписания) {
            return $this
                ->addUsingAlias(ПроектыTableMap::COL_ID, $�редписания->getпроект(), $comparison);
        } elseif ($�редписания instanceof ObjectCollection) {
            return $this
                ->useПредписанияQuery()
                ->filterByPrimaryKeys($�редписания->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByПредписания() only accepts arguments of type \Предписания or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Предписания relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function joinПредписания($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Предписания');

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
            $this->addJoinObject($join, 'Предписания');
        }

        return $this;
    }

    /**
     * Use the Предписания relation Предписания object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ПредписанияQuery A secondary query class using the current class as primary query
     */
    public function useПредписанияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinПредписания($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Предписания', '\ПредписанияQuery');
    }

    /**
     * Filter the query by a related \проблемныевопросы object
     *
     * @param \проблемныевопросы|ObjectCollection $�роблемныевопросы the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByпроблемныевопросы($�роблемныевопросы, $comparison = null)
    {
        if ($�роблемныевопросы instanceof \проблемныевопросы) {
            return $this
                ->addUsingAlias(ПроектыTableMap::COL_ID, $�роблемныевопросы->getпроект(), $comparison);
        } elseif ($�роблемныевопросы instanceof ObjectCollection) {
            return $this
                ->useпроблемныевопросыQuery()
                ->filterByPrimaryKeys($�роблемныевопросы->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByпроблемныевопросы() only accepts arguments of type \проблемныевопросы or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the проблемныевопросы relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function joinпроблемныевопросы($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('проблемныевопросы');

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
            $this->addJoinObject($join, 'проблемныевопросы');
        }

        return $this;
    }

    /**
     * Use the проблемныевопросы relation проблемныевопросы object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \проблемныевопросыQuery A secondary query class using the current class as primary query
     */
    public function useпроблемныевопросыQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinпроблемныевопросы($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'проблемныевопросы', '\проблемныевопросыQuery');
    }

    /**
     * Filter the query by a related \программы object
     *
     * @param \программы|ObjectCollection $�рограммы the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByпрограммы($�рограммы, $comparison = null)
    {
        if ($�рограммы instanceof \программы) {
            return $this
                ->addUsingAlias(ПроектыTableMap::COL_ID, $�рограммы->getпроект(), $comparison);
        } elseif ($�рограммы instanceof ObjectCollection) {
            return $this
                ->useпрограммыQuery()
                ->filterByPrimaryKeys($�рограммы->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByпрограммы() only accepts arguments of type \программы or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the программы relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function joinпрограммы($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('программы');

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
            $this->addJoinObject($join, 'программы');
        }

        return $this;
    }

    /**
     * Use the программы relation программы object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \программыQuery A secondary query class using the current class as primary query
     */
    public function useпрограммыQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinпрограммы($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'программы', '\программыQuery');
    }

    /**
     * Filter the query by a related \участкиработ object
     *
     * @param \участкиработ|ObjectCollection $�часткиработ the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByучасткиработ($�часткиработ, $comparison = null)
    {
        if ($�часткиработ instanceof \участкиработ) {
            return $this
                ->addUsingAlias(ПроектыTableMap::COL_ID, $�часткиработ->getпроект(), $comparison);
        } elseif ($�часткиработ instanceof ObjectCollection) {
            return $this
                ->useучасткиработQuery()
                ->filterByPrimaryKeys($�часткиработ->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByучасткиработ() only accepts arguments of type \участкиработ or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the участкиработ relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function joinучасткиработ($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('участкиработ');

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
            $this->addJoinObject($join, 'участкиработ');
        }

        return $this;
    }

    /**
     * Use the участкиработ relation участкиработ object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \участкиработQuery A secondary query class using the current class as primary query
     */
    public function useучасткиработQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinучасткиработ($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'участкиработ', '\участкиработQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildПроекты $�роекты Object to remove from the list of results
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function prune($�роекты = null)
    {
        if ($�роекты) {
            $this->addUsingAlias(ПроектыTableMap::COL_ID, $�роекты->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Проекты table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПроектыTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ПроектыTableMap::clearInstancePool();
            ПроектыTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ПроектыTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ПроектыTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ПроектыTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ПроектыTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ПроектыQuery
