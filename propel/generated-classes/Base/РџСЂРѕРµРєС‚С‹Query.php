<?php

namespace Base;

use \Проекты as ChildПроекты;
use \ПроектыQuery as ChildПроектыQuery;
use \Exception;
use Map\ПроектыTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Проекты' table.
 *
 * 
 *
 * @method     ChildПроектыQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildПроектыQuery orderByКодпроекта($order = Criteria::ASC) Order by the КодПроекта column
 * @method     ChildПроектыQuery orderByПроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildПроектыQuery orderByРуководитель($order = Criteria::ASC) Order by the Руководитель column
 * @method     ChildПроектыQuery orderByЗаказчик($order = Criteria::ASC) Order by the Заказчик column
 * @method     ChildПроектыQuery orderByПодрядчики($order = Criteria::ASC) Order by the Подрядчики column
 * @method     ChildПроектыQuery orderByПериодвыполненияработ($order = Criteria::ASC) Order by the ПериодВыполненияРабот column
 * @method     ChildПроектыQuery orderByДеталипроекта($order = Criteria::ASC) Order by the ДеталиПроекта column
 * @method     ChildПроектыQuery orderByТипстроительства($order = Criteria::ASC) Order by the ТипСтроительства column
 * @method     ChildПроектыQuery orderByНазваниепапкипроекта($order = Criteria::ASC) Order by the НазваниеПапкиПроекта column
 * @method     ChildПроектыQuery orderByКартинка($order = Criteria::ASC) Order by the Картинка column
 * @method     ChildПроектыQuery orderByКарточкапроекта($order = Criteria::ASC) Order by the КарточкаПроекта column
 *
 * @method     ChildПроектыQuery groupById() Group by the id column
 * @method     ChildПроектыQuery groupByКодпроекта() Group by the КодПроекта column
 * @method     ChildПроектыQuery groupByПроект() Group by the Проект column
 * @method     ChildПроектыQuery groupByРуководитель() Group by the Руководитель column
 * @method     ChildПроектыQuery groupByЗаказчик() Group by the Заказчик column
 * @method     ChildПроектыQuery groupByПодрядчики() Group by the Подрядчики column
 * @method     ChildПроектыQuery groupByПериодвыполненияработ() Group by the ПериодВыполненияРабот column
 * @method     ChildПроектыQuery groupByДеталипроекта() Group by the ДеталиПроекта column
 * @method     ChildПроектыQuery groupByТипстроительства() Group by the ТипСтроительства column
 * @method     ChildПроектыQuery groupByНазваниепапкипроекта() Group by the НазваниеПапкиПроекта column
 * @method     ChildПроектыQuery groupByКартинка() Group by the Картинка column
 * @method     ChildПроектыQuery groupByКарточкапроекта() Group by the КарточкаПроекта column
 *
 * @method     ChildПроектыQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildПроектыQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildПроектыQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildПроектыQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildПроектыQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildПроектыQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildПроекты findOne(ConnectionInterface $con = null) Return the first ChildПроекты matching the query
 * @method     ChildПроекты findOneOrCreate(ConnectionInterface $con = null) Return the first ChildПроекты matching the query, or a new ChildПроекты object populated from the query conditions when no match is found
 *
 * @method     ChildПроекты findOneById(int $id) Return the first ChildПроекты filtered by the id column
 * @method     ChildПроекты findOneByКодпроекта(string $КодПроекта) Return the first ChildПроекты filtered by the КодПроекта column
 * @method     ChildПроекты findOneByПроект(string $Проект) Return the first ChildПроекты filtered by the Проект column
 * @method     ChildПроекты findOneByРуководитель(string $Руководитель) Return the first ChildПроекты filtered by the Руководитель column
 * @method     ChildПроекты findOneByЗаказчик(string $Заказчик) Return the first ChildПроекты filtered by the Заказчик column
 * @method     ChildПроекты findOneByПодрядчики(string $Подрядчики) Return the first ChildПроекты filtered by the Подрядчики column
 * @method     ChildПроекты findOneByПериодвыполненияработ(string $ПериодВыполненияРабот) Return the first ChildПроекты filtered by the ПериодВыполненияРабот column
 * @method     ChildПроекты findOneByДеталипроекта(string $ДеталиПроекта) Return the first ChildПроекты filtered by the ДеталиПроекта column
 * @method     ChildПроекты findOneByТипстроительства(string $ТипСтроительства) Return the first ChildПроекты filtered by the ТипСтроительства column
 * @method     ChildПроекты findOneByНазваниепапкипроекта(string $НазваниеПапкиПроекта) Return the first ChildПроекты filtered by the НазваниеПапкиПроекта column
 * @method     ChildПроекты findOneByКартинка(string $Картинка) Return the first ChildПроекты filtered by the Картинка column
 * @method     ChildПроекты findOneByКарточкапроекта(string $КарточкаПроекта) Return the first ChildПроекты filtered by the КарточкаПроекта column *

 * @method     ChildПроекты requirePk($key, ConnectionInterface $con = null) Return the ChildПроекты by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOne(ConnectionInterface $con = null) Return the first ChildПроекты matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПроекты requireOneById(int $id) Return the first ChildПроекты filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByКодпроекта(string $КодПроекта) Return the first ChildПроекты filtered by the КодПроекта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByПроект(string $Проект) Return the first ChildПроекты filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByРуководитель(string $Руководитель) Return the first ChildПроекты filtered by the Руководитель column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByЗаказчик(string $Заказчик) Return the first ChildПроекты filtered by the Заказчик column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByПодрядчики(string $Подрядчики) Return the first ChildПроекты filtered by the Подрядчики column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByПериодвыполненияработ(string $ПериодВыполненияРабот) Return the first ChildПроекты filtered by the ПериодВыполненияРабот column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByДеталипроекта(string $ДеталиПроекта) Return the first ChildПроекты filtered by the ДеталиПроекта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByТипстроительства(string $ТипСтроительства) Return the first ChildПроекты filtered by the ТипСтроительства column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByНазваниепапкипроекта(string $НазваниеПапкиПроекта) Return the first ChildПроекты filtered by the НазваниеПапкиПроекта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByКартинка(string $Картинка) Return the first ChildПроекты filtered by the Картинка column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроекты requireOneByКарточкапроекта(string $КарточкаПроекта) Return the first ChildПроекты filtered by the КарточкаПроекта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПроекты[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildПроекты objects based on current ModelCriteria
 * @method     ChildПроекты[]|ObjectCollection findById(int $id) Return ChildПроекты objects filtered by the id column
 * @method     ChildПроекты[]|ObjectCollection findByКодпроекта(string $КодПроекта) Return ChildПроекты objects filtered by the КодПроекта column
 * @method     ChildПроекты[]|ObjectCollection findByПроект(string $Проект) Return ChildПроекты objects filtered by the Проект column
 * @method     ChildПроекты[]|ObjectCollection findByРуководитель(string $Руководитель) Return ChildПроекты objects filtered by the Руководитель column
 * @method     ChildПроекты[]|ObjectCollection findByЗаказчик(string $Заказчик) Return ChildПроекты objects filtered by the Заказчик column
 * @method     ChildПроекты[]|ObjectCollection findByПодрядчики(string $Подрядчики) Return ChildПроекты objects filtered by the Подрядчики column
 * @method     ChildПроекты[]|ObjectCollection findByПериодвыполненияработ(string $ПериодВыполненияРабот) Return ChildПроекты objects filtered by the ПериодВыполненияРабот column
 * @method     ChildПроекты[]|ObjectCollection findByДеталипроекта(string $ДеталиПроекта) Return ChildПроекты objects filtered by the ДеталиПроекта column
 * @method     ChildПроекты[]|ObjectCollection findByТипстроительства(string $ТипСтроительства) Return ChildПроекты objects filtered by the ТипСтроительства column
 * @method     ChildПроекты[]|ObjectCollection findByНазваниепапкипроекта(string $НазваниеПапкиПроекта) Return ChildПроекты objects filtered by the НазваниеПапкиПроекта column
 * @method     ChildПроекты[]|ObjectCollection findByКартинка(string $Картинка) Return ChildПроекты objects filtered by the Картинка column
 * @method     ChildПроекты[]|ObjectCollection findByКарточкапроекта(string $КарточкаПроекта) Return ChildПроекты objects filtered by the КарточкаПроекта column
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
        throw new LogicException('The Проекты object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Проекты object has no primary key');
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
        throw new LogicException('The Проекты object has no primary key');
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
        throw new LogicException('The Проекты object has no primary key');
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
     * Filter the query on the КодПроекта column
     *
     * Example usage:
     * <code>
     * $query->filterByКодпроекта('fooValue');   // WHERE КодПроекта = 'fooValue'
     * $query->filterByКодпроекта('%fooValue%'); // WHERE КодПроекта LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�одпроекта The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByКодпроекта($�одпроекта = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�одпроекта)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�одпроекта)) {
                $�одпроекта = str_replace('*', '%', $�одпроекта);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_КОДПРОЕКТА, $�одпроекта, $comparison);
    }

    /**
     * Filter the query on the Проект column
     *
     * Example usage:
     * <code>
     * $query->filterByПроект('fooValue');   // WHERE Проект = 'fooValue'
     * $query->filterByПроект('%fooValue%'); // WHERE Проект LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�роект The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByПроект($�роект = null, $comparison = null)
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
     * $query->filterByРуководитель('fooValue');   // WHERE Руководитель = 'fooValue'
     * $query->filterByРуководитель('%fooValue%'); // WHERE Руководитель LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�уководитель The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByРуководитель($�уководитель = null, $comparison = null)
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
     * $query->filterByЗаказчик('fooValue');   // WHERE Заказчик = 'fooValue'
     * $query->filterByЗаказчик('%fooValue%'); // WHERE Заказчик LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�аказчик The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByЗаказчик($�аказчик = null, $comparison = null)
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
     * $query->filterByПодрядчики('fooValue');   // WHERE Подрядчики = 'fooValue'
     * $query->filterByПодрядчики('%fooValue%'); // WHERE Подрядчики LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�одрядчики The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByПодрядчики($�одрядчики = null, $comparison = null)
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
     * Filter the query on the ПериодВыполненияРабот column
     *
     * Example usage:
     * <code>
     * $query->filterByПериодвыполненияработ('fooValue');   // WHERE ПериодВыполненияРабот = 'fooValue'
     * $query->filterByПериодвыполненияработ('%fooValue%'); // WHERE ПериодВыполненияРабот LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ериодвыполненияработ The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByПериодвыполненияработ($�ериодвыполненияработ = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ериодвыполненияработ)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ериодвыполненияработ)) {
                $�ериодвыполненияработ = str_replace('*', '%', $�ериодвыполненияработ);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ПЕРИОДВЫПОЛНЕНИЯРАБОТ, $�ериодвыполненияработ, $comparison);
    }

    /**
     * Filter the query on the ДеталиПроекта column
     *
     * Example usage:
     * <code>
     * $query->filterByДеталипроекта('fooValue');   // WHERE ДеталиПроекта = 'fooValue'
     * $query->filterByДеталипроекта('%fooValue%'); // WHERE ДеталиПроекта LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�еталипроекта The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByДеталипроекта($�еталипроекта = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�еталипроекта)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�еталипроекта)) {
                $�еталипроекта = str_replace('*', '%', $�еталипроекта);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ДЕТАЛИПРОЕКТА, $�еталипроекта, $comparison);
    }

    /**
     * Filter the query on the ТипСтроительства column
     *
     * Example usage:
     * <code>
     * $query->filterByТипстроительства('fooValue');   // WHERE ТипСтроительства = 'fooValue'
     * $query->filterByТипстроительства('%fooValue%'); // WHERE ТипСтроительства LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ипстроительства The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByТипстроительства($�ипстроительства = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ипстроительства)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ипстроительства)) {
                $�ипстроительства = str_replace('*', '%', $�ипстроительства);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_ТИПСТРОИТЕЛЬСТВА, $�ипстроительства, $comparison);
    }

    /**
     * Filter the query on the НазваниеПапкиПроекта column
     *
     * Example usage:
     * <code>
     * $query->filterByНазваниепапкипроекта('fooValue');   // WHERE НазваниеПапкиПроекта = 'fooValue'
     * $query->filterByНазваниепапкипроекта('%fooValue%'); // WHERE НазваниеПапкиПроекта LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�азваниепапкипроекта The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByНазваниепапкипроекта($�азваниепапкипроекта = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�азваниепапкипроекта)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�азваниепапкипроекта)) {
                $�азваниепапкипроекта = str_replace('*', '%', $�азваниепапкипроекта);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_НАЗВАНИЕПАПКИПРОЕКТА, $�азваниепапкипроекта, $comparison);
    }

    /**
     * Filter the query on the Картинка column
     *
     * Example usage:
     * <code>
     * $query->filterByКартинка('fooValue');   // WHERE Картинка = 'fooValue'
     * $query->filterByКартинка('%fooValue%'); // WHERE Картинка LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�артинка The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByКартинка($�артинка = null, $comparison = null)
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
     * Filter the query on the КарточкаПроекта column
     *
     * Example usage:
     * <code>
     * $query->filterByКарточкапроекта('fooValue');   // WHERE КарточкаПроекта = 'fooValue'
     * $query->filterByКарточкапроекта('%fooValue%'); // WHERE КарточкаПроекта LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�арточкапроекта The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроектыQuery The current query, for fluid interface
     */
    public function filterByКарточкапроекта($�арточкапроекта = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�арточкапроекта)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�арточкапроекта)) {
                $�арточкапроекта = str_replace('*', '%', $�арточкапроекта);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроектыTableMap::COL_КАРТОЧКАПРОЕКТА, $�арточкапроекта, $comparison);
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
            throw new LogicException('Проекты object has no primary key');

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
