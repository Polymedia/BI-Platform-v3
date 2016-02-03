<?php

namespace Base;

use \People as ChildPeople;
use \PeopleQuery as ChildPeopleQuery;
use \Exception;
use \PDO;
use Map\PeopleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'people' table.
 *
 *
 *
 * @method     ChildPeopleQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPeopleQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildPeopleQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildPeopleQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildPeopleQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     ChildPeopleQuery orderByFixText($order = Criteria::ASC) Order by the fix_text column
 * @method     ChildPeopleQuery orderByNormal($order = Criteria::ASC) Order by the normal column
 * @method     ChildPeopleQuery orderByCompany($order = Criteria::ASC) Order by the company column
 *
 * @method     ChildPeopleQuery groupById() Group by the id column
 * @method     ChildPeopleQuery groupByName() Group by the name column
 * @method     ChildPeopleQuery groupByDate() Group by the date column
 * @method     ChildPeopleQuery groupByCity() Group by the city column
 * @method     ChildPeopleQuery groupByStreet() Group by the street column
 * @method     ChildPeopleQuery groupByFixText() Group by the fix_text column
 * @method     ChildPeopleQuery groupByNormal() Group by the normal column
 * @method     ChildPeopleQuery groupByCompany() Group by the company column
 *
 * @method     ChildPeopleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPeopleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPeopleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPeopleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPeopleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPeopleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPeople findOne(ConnectionInterface $con = null) Return the first ChildPeople matching the query
 * @method     ChildPeople findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPeople matching the query, or a new ChildPeople object populated from the query conditions when no match is found
 *
 * @method     ChildPeople findOneById(int $id) Return the first ChildPeople filtered by the id column
 * @method     ChildPeople findOneByName(string $name) Return the first ChildPeople filtered by the name column
 * @method     ChildPeople findOneByDate(string $date) Return the first ChildPeople filtered by the date column
 * @method     ChildPeople findOneByCity(string $city) Return the first ChildPeople filtered by the city column
 * @method     ChildPeople findOneByStreet(string $street) Return the first ChildPeople filtered by the street column
 * @method     ChildPeople findOneByFixText(string $fix_text) Return the first ChildPeople filtered by the fix_text column
 * @method     ChildPeople findOneByNormal(string $normal) Return the first ChildPeople filtered by the normal column
 * @method     ChildPeople findOneByCompany(string $company) Return the first ChildPeople filtered by the company column *

 * @method     ChildPeople requirePk($key, ConnectionInterface $con = null) Return the ChildPeople by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPeople requireOne(ConnectionInterface $con = null) Return the first ChildPeople matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPeople requireOneById(int $id) Return the first ChildPeople filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPeople requireOneByName(string $name) Return the first ChildPeople filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPeople requireOneByDate(string $date) Return the first ChildPeople filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPeople requireOneByCity(string $city) Return the first ChildPeople filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPeople requireOneByStreet(string $street) Return the first ChildPeople filtered by the street column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPeople requireOneByFixText(string $fix_text) Return the first ChildPeople filtered by the fix_text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPeople requireOneByNormal(string $normal) Return the first ChildPeople filtered by the normal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPeople requireOneByCompany(string $company) Return the first ChildPeople filtered by the company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPeople[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPeople objects based on current ModelCriteria
 * @method     ChildPeople[]|ObjectCollection findById(int $id) Return ChildPeople objects filtered by the id column
 * @method     ChildPeople[]|ObjectCollection findByName(string $name) Return ChildPeople objects filtered by the name column
 * @method     ChildPeople[]|ObjectCollection findByDate(string $date) Return ChildPeople objects filtered by the date column
 * @method     ChildPeople[]|ObjectCollection findByCity(string $city) Return ChildPeople objects filtered by the city column
 * @method     ChildPeople[]|ObjectCollection findByStreet(string $street) Return ChildPeople objects filtered by the street column
 * @method     ChildPeople[]|ObjectCollection findByFixText(string $fix_text) Return ChildPeople objects filtered by the fix_text column
 * @method     ChildPeople[]|ObjectCollection findByNormal(string $normal) Return ChildPeople objects filtered by the normal column
 * @method     ChildPeople[]|ObjectCollection findByCompany(string $company) Return ChildPeople objects filtered by the company column
 * @method     ChildPeople[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PeopleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PeopleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\People', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPeopleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPeopleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPeopleQuery) {
            return $criteria;
        }
        $query = new ChildPeopleQuery();
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
     * @return ChildPeople|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PeopleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PeopleTableMap::DATABASE_NAME);
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
     * @return ChildPeople A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, date, city, street, fix_text, normal, company FROM people WHERE id = :p0';
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
            /** @var ChildPeople $obj */
            $obj = new ChildPeople();
            $obj->hydrate($row);
            PeopleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPeople|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PeopleTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PeopleTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PeopleTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PeopleTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PeopleTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PeopleTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('fooValue');   // WHERE date = 'fooValue'
     * $query->filterByDate('%fooValue%'); // WHERE date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $date The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $date)) {
                $date = str_replace('*', '%', $date);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PeopleTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PeopleTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the street column
     *
     * Example usage:
     * <code>
     * $query->filterByStreet('fooValue');   // WHERE street = 'fooValue'
     * $query->filterByStreet('%fooValue%'); // WHERE street LIKE '%fooValue%'
     * </code>
     *
     * @param     string $street The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterByStreet($street = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($street)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $street)) {
                $street = str_replace('*', '%', $street);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PeopleTableMap::COL_STREET, $street, $comparison);
    }

    /**
     * Filter the query on the fix_text column
     *
     * Example usage:
     * <code>
     * $query->filterByFixText('fooValue');   // WHERE fix_text = 'fooValue'
     * $query->filterByFixText('%fooValue%'); // WHERE fix_text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fixText The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterByFixText($fixText = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fixText)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fixText)) {
                $fixText = str_replace('*', '%', $fixText);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PeopleTableMap::COL_FIX_TEXT, $fixText, $comparison);
    }

    /**
     * Filter the query on the normal column
     *
     * Example usage:
     * <code>
     * $query->filterByNormal('fooValue');   // WHERE normal = 'fooValue'
     * $query->filterByNormal('%fooValue%'); // WHERE normal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $normal The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterByNormal($normal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($normal)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $normal)) {
                $normal = str_replace('*', '%', $normal);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PeopleTableMap::COL_NORMAL, $normal, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%'); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $company The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $company)) {
                $company = str_replace('*', '%', $company);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PeopleTableMap::COL_COMPANY, $company, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPeople $people Object to remove from the list of results
     *
     * @return $this|ChildPeopleQuery The current query, for fluid interface
     */
    public function prune($people = null)
    {
        if ($people) {
            $this->addUsingAlias(PeopleTableMap::COL_ID, $people->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the people table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PeopleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PeopleTableMap::clearInstancePool();
            PeopleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PeopleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PeopleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PeopleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PeopleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PeopleQuery
