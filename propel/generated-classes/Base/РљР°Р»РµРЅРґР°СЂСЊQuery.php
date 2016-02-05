<?php

namespace Base;

use \Календарь as ChildКалендарь;
use \КалендарьQuery as ChildКалендарьQuery;
use \Exception;
use \PDO;
use Map\КалендарьTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Календарь' table.
 *
 * 
 *
 * @method     ChildКалендарьQuery orderByдата($order = Criteria::ASC) Order by the Дата column
 * @method     ChildКалендарьQuery orderByгод($order = Criteria::ASC) Order by the Год column
 * @method     ChildКалендарьQuery orderByполугодие($order = Criteria::ASC) Order by the Полугодие column
 * @method     ChildКалендарьQuery orderByквартал($order = Criteria::ASC) Order by the Квартал column
 * @method     ChildКалендарьQuery orderByномермесяца($order = Criteria::ASC) Order by the Номер_месяца column
 * @method     ChildКалендарьQuery orderByмесяц($order = Criteria::ASC) Order by the Месяц column
 * @method     ChildКалендарьQuery orderByдень($order = Criteria::ASC) Order by the День column
 * @method     ChildКалендарьQuery orderByномернедели($order = Criteria::ASC) Order by the Номер_недели column
 * @method     ChildКалендарьQuery orderByденьнедели($order = Criteria::ASC) Order by the День_недели column
 * @method     ChildКалендарьQuery orderByденьвгоду($order = Criteria::ASC) Order by the День_в_году column
 *
 * @method     ChildКалендарьQuery groupByдата() Group by the Дата column
 * @method     ChildКалендарьQuery groupByгод() Group by the Год column
 * @method     ChildКалендарьQuery groupByполугодие() Group by the Полугодие column
 * @method     ChildКалендарьQuery groupByквартал() Group by the Квартал column
 * @method     ChildКалендарьQuery groupByномермесяца() Group by the Номер_месяца column
 * @method     ChildКалендарьQuery groupByмесяц() Group by the Месяц column
 * @method     ChildКалендарьQuery groupByдень() Group by the День column
 * @method     ChildКалендарьQuery groupByномернедели() Group by the Номер_недели column
 * @method     ChildКалендарьQuery groupByденьнедели() Group by the День_недели column
 * @method     ChildКалендарьQuery groupByденьвгоду() Group by the День_в_году column
 *
 * @method     ChildКалендарьQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildКалендарьQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildКалендарьQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildКалендарьQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildКалендарьQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildКалендарьQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildКалендарьQuery leftJoinгода($relationAlias = null) Adds a LEFT JOIN clause to the query using the года relation
 * @method     ChildКалендарьQuery rightJoinгода($relationAlias = null) Adds a RIGHT JOIN clause to the query using the года relation
 * @method     ChildКалендарьQuery innerJoinгода($relationAlias = null) Adds a INNER JOIN clause to the query using the года relation
 *
 * @method     ChildКалендарьQuery joinWithгода($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the года relation
 *
 * @method     ChildКалендарьQuery leftJoinWithгода() Adds a LEFT JOIN clause and with to the query using the года relation
 * @method     ChildКалендарьQuery rightJoinWithгода() Adds a RIGHT JOIN clause and with to the query using the года relation
 * @method     ChildКалендарьQuery innerJoinWithгода() Adds a INNER JOIN clause and with to the query using the года relation
 *
 * @method     ChildКалендарьQuery leftJoinднинедели($relationAlias = null) Adds a LEFT JOIN clause to the query using the днинедели relation
 * @method     ChildКалендарьQuery rightJoinднинедели($relationAlias = null) Adds a RIGHT JOIN clause to the query using the днинедели relation
 * @method     ChildКалендарьQuery innerJoinднинедели($relationAlias = null) Adds a INNER JOIN clause to the query using the днинедели relation
 *
 * @method     ChildКалендарьQuery joinWithднинедели($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the днинедели relation
 *
 * @method     ChildКалендарьQuery leftJoinWithднинедели() Adds a LEFT JOIN clause and with to the query using the днинедели relation
 * @method     ChildКалендарьQuery rightJoinWithднинедели() Adds a RIGHT JOIN clause and with to the query using the днинедели relation
 * @method     ChildКалендарьQuery innerJoinWithднинедели() Adds a INNER JOIN clause and with to the query using the днинедели relation
 *
 * @method     ChildКалендарьQuery leftJoinмесяца($relationAlias = null) Adds a LEFT JOIN clause to the query using the месяца relation
 * @method     ChildКалендарьQuery rightJoinмесяца($relationAlias = null) Adds a RIGHT JOIN clause to the query using the месяца relation
 * @method     ChildКалендарьQuery innerJoinмесяца($relationAlias = null) Adds a INNER JOIN clause to the query using the месяца relation
 *
 * @method     ChildКалендарьQuery joinWithмесяца($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the месяца relation
 *
 * @method     ChildКалендарьQuery leftJoinWithмесяца() Adds a LEFT JOIN clause and with to the query using the месяца relation
 * @method     ChildКалендарьQuery rightJoinWithмесяца() Adds a RIGHT JOIN clause and with to the query using the месяца relation
 * @method     ChildКалендарьQuery innerJoinWithмесяца() Adds a INNER JOIN clause and with to the query using the месяца relation
 *
 * @method     ChildКалендарьQuery leftJoinвыработка($relationAlias = null) Adds a LEFT JOIN clause to the query using the выработка relation
 * @method     ChildКалендарьQuery rightJoinвыработка($relationAlias = null) Adds a RIGHT JOIN clause to the query using the выработка relation
 * @method     ChildКалендарьQuery innerJoinвыработка($relationAlias = null) Adds a INNER JOIN clause to the query using the выработка relation
 *
 * @method     ChildКалендарьQuery joinWithвыработка($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the выработка relation
 *
 * @method     ChildКалендарьQuery leftJoinWithвыработка() Adds a LEFT JOIN clause and with to the query using the выработка relation
 * @method     ChildКалендарьQuery rightJoinWithвыработка() Adds a RIGHT JOIN clause and with to the query using the выработка relation
 * @method     ChildКалендарьQuery innerJoinWithвыработка() Adds a INNER JOIN clause and with to the query using the выработка relation
 *
 * @method     ChildКалендарьQuery leftJoinдатыобновленийдашбордов($relationAlias = null) Adds a LEFT JOIN clause to the query using the датыобновленийдашбордов relation
 * @method     ChildКалендарьQuery rightJoinдатыобновленийдашбордов($relationAlias = null) Adds a RIGHT JOIN clause to the query using the датыобновленийдашбордов relation
 * @method     ChildКалендарьQuery innerJoinдатыобновленийдашбордов($relationAlias = null) Adds a INNER JOIN clause to the query using the датыобновленийдашбордов relation
 *
 * @method     ChildКалендарьQuery joinWithдатыобновленийдашбордов($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the датыобновленийдашбордов relation
 *
 * @method     ChildКалендарьQuery leftJoinWithдатыобновленийдашбордов() Adds a LEFT JOIN clause and with to the query using the датыобновленийдашбордов relation
 * @method     ChildКалендарьQuery rightJoinWithдатыобновленийдашбордов() Adds a RIGHT JOIN clause and with to the query using the датыобновленийдашбордов relation
 * @method     ChildКалендарьQuery innerJoinWithдатыобновленийдашбордов() Adds a INNER JOIN clause and with to the query using the датыобновленийдашбордов relation
 *
 * @method     ChildКалендарьQuery leftJoinмтр($relationAlias = null) Adds a LEFT JOIN clause to the query using the мтр relation
 * @method     ChildКалендарьQuery rightJoinмтр($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мтр relation
 * @method     ChildКалендарьQuery innerJoinмтр($relationAlias = null) Adds a INNER JOIN clause to the query using the мтр relation
 *
 * @method     ChildКалендарьQuery joinWithмтр($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мтр relation
 *
 * @method     ChildКалендарьQuery leftJoinWithмтр() Adds a LEFT JOIN clause and with to the query using the мтр relation
 * @method     ChildКалендарьQuery rightJoinWithмтр() Adds a RIGHT JOIN clause and with to the query using the мтр relation
 * @method     ChildКалендарьQuery innerJoinWithмтр() Adds a INNER JOIN clause and with to the query using the мтр relation
 *
 * @method     ChildКалендарьQuery leftJoinмобилизация($relationAlias = null) Adds a LEFT JOIN clause to the query using the мобилизация relation
 * @method     ChildКалендарьQuery rightJoinмобилизация($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мобилизация relation
 * @method     ChildКалендарьQuery innerJoinмобилизация($relationAlias = null) Adds a INNER JOIN clause to the query using the мобилизация relation
 *
 * @method     ChildКалендарьQuery joinWithмобилизация($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мобилизация relation
 *
 * @method     ChildКалендарьQuery leftJoinWithмобилизация() Adds a LEFT JOIN clause and with to the query using the мобилизация relation
 * @method     ChildКалендарьQuery rightJoinWithмобилизация() Adds a RIGHT JOIN clause and with to the query using the мобилизация relation
 * @method     ChildКалендарьQuery innerJoinWithмобилизация() Adds a INNER JOIN clause and with to the query using the мобилизация relation
 *
 * @method     ChildКалендарьQuery leftJoinмобилизацияпомесяцам($relationAlias = null) Adds a LEFT JOIN clause to the query using the мобилизацияпомесяцам relation
 * @method     ChildКалендарьQuery rightJoinмобилизацияпомесяцам($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мобилизацияпомесяцам relation
 * @method     ChildКалендарьQuery innerJoinмобилизацияпомесяцам($relationAlias = null) Adds a INNER JOIN clause to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildКалендарьQuery joinWithмобилизацияпомесяцам($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildКалендарьQuery leftJoinWithмобилизацияпомесяцам() Adds a LEFT JOIN clause and with to the query using the мобилизацияпомесяцам relation
 * @method     ChildКалендарьQuery rightJoinWithмобилизацияпомесяцам() Adds a RIGHT JOIN clause and with to the query using the мобилизацияпомесяцам relation
 * @method     ChildКалендарьQuery innerJoinWithмобилизацияпомесяцам() Adds a INNER JOIN clause and with to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildКалендарьQuery leftJoinПредписанияRelatedByдатавыдачи($relationAlias = null) Adds a LEFT JOIN clause to the query using the ПредписанияRelatedByдатавыдачи relation
 * @method     ChildКалендарьQuery rightJoinПредписанияRelatedByдатавыдачи($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ПредписанияRelatedByдатавыдачи relation
 * @method     ChildКалендарьQuery innerJoinПредписанияRelatedByдатавыдачи($relationAlias = null) Adds a INNER JOIN clause to the query using the ПредписанияRelatedByдатавыдачи relation
 *
 * @method     ChildКалендарьQuery joinWithПредписанияRelatedByдатавыдачи($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ПредписанияRelatedByдатавыдачи relation
 *
 * @method     ChildКалендарьQuery leftJoinWithПредписанияRelatedByдатавыдачи() Adds a LEFT JOIN clause and with to the query using the ПредписанияRelatedByдатавыдачи relation
 * @method     ChildКалендарьQuery rightJoinWithПредписанияRelatedByдатавыдачи() Adds a RIGHT JOIN clause and with to the query using the ПредписанияRelatedByдатавыдачи relation
 * @method     ChildКалендарьQuery innerJoinWithПредписанияRelatedByдатавыдачи() Adds a INNER JOIN clause and with to the query using the ПредписанияRelatedByдатавыдачи relation
 *
 * @method     ChildКалендарьQuery leftJoinПредписанияRelatedByплановаядатаустранения($relationAlias = null) Adds a LEFT JOIN clause to the query using the ПредписанияRelatedByплановаядатаустранения relation
 * @method     ChildКалендарьQuery rightJoinПредписанияRelatedByплановаядатаустранения($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ПредписанияRelatedByплановаядатаустранения relation
 * @method     ChildКалендарьQuery innerJoinПредписанияRelatedByплановаядатаустранения($relationAlias = null) Adds a INNER JOIN clause to the query using the ПредписанияRelatedByплановаядатаустранения relation
 *
 * @method     ChildКалендарьQuery joinWithПредписанияRelatedByплановаядатаустранения($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ПредписанияRelatedByплановаядатаустранения relation
 *
 * @method     ChildКалендарьQuery leftJoinWithПредписанияRelatedByплановаядатаустранения() Adds a LEFT JOIN clause and with to the query using the ПредписанияRelatedByплановаядатаустранения relation
 * @method     ChildКалендарьQuery rightJoinWithПредписанияRelatedByплановаядатаустранения() Adds a RIGHT JOIN clause and with to the query using the ПредписанияRelatedByплановаядатаустранения relation
 * @method     ChildКалендарьQuery innerJoinWithПредписанияRelatedByплановаядатаустранения() Adds a INNER JOIN clause and with to the query using the ПредписанияRelatedByплановаядатаустранения relation
 *
 * @method     ChildКалендарьQuery leftJoinПредписанияRelatedByфактическаядатаустранения($relationAlias = null) Adds a LEFT JOIN clause to the query using the ПредписанияRelatedByфактическаядатаустранения relation
 * @method     ChildКалендарьQuery rightJoinПредписанияRelatedByфактическаядатаустранения($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ПредписанияRelatedByфактическаядатаустранения relation
 * @method     ChildКалендарьQuery innerJoinПредписанияRelatedByфактическаядатаустранения($relationAlias = null) Adds a INNER JOIN clause to the query using the ПредписанияRelatedByфактическаядатаустранения relation
 *
 * @method     ChildКалендарьQuery joinWithПредписанияRelatedByфактическаядатаустранения($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ПредписанияRelatedByфактическаядатаустранения relation
 *
 * @method     ChildКалендарьQuery leftJoinWithПредписанияRelatedByфактическаядатаустранения() Adds a LEFT JOIN clause and with to the query using the ПредписанияRelatedByфактическаядатаустранения relation
 * @method     ChildКалендарьQuery rightJoinWithПредписанияRelatedByфактическаядатаустранения() Adds a RIGHT JOIN clause and with to the query using the ПредписанияRelatedByфактическаядатаустранения relation
 * @method     ChildКалендарьQuery innerJoinWithПредписанияRelatedByфактическаядатаустранения() Adds a INNER JOIN clause and with to the query using the ПредписанияRelatedByфактическаядатаустранения relation
 *
 * @method     ChildКалендарьQuery leftJoinфизическиеобъёмы($relationAlias = null) Adds a LEFT JOIN clause to the query using the физическиеобъёмы relation
 * @method     ChildКалендарьQuery rightJoinфизическиеобъёмы($relationAlias = null) Adds a RIGHT JOIN clause to the query using the физическиеобъёмы relation
 * @method     ChildКалендарьQuery innerJoinфизическиеобъёмы($relationAlias = null) Adds a INNER JOIN clause to the query using the физическиеобъёмы relation
 *
 * @method     ChildКалендарьQuery joinWithфизическиеобъёмы($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the физическиеобъёмы relation
 *
 * @method     ChildКалендарьQuery leftJoinWithфизическиеобъёмы() Adds a LEFT JOIN clause and with to the query using the физическиеобъёмы relation
 * @method     ChildКалендарьQuery rightJoinWithфизическиеобъёмы() Adds a RIGHT JOIN clause and with to the query using the физическиеобъёмы relation
 * @method     ChildКалендарьQuery innerJoinWithфизическиеобъёмы() Adds a INNER JOIN clause and with to the query using the физическиеобъёмы relation
 *
 * @method     \годаQuery|\днинеделиQuery|\месяцаQuery|\выработкаQuery|\датыобновленийдашбордовQuery|\мтрQuery|\мобилизацияQuery|\мобилизацияпомесяцамQuery|\ПредписанияQuery|\физическиеобъёмыQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildКалендарь findOne(ConnectionInterface $con = null) Return the first ChildКалендарь matching the query
 * @method     ChildКалендарь findOneOrCreate(ConnectionInterface $con = null) Return the first ChildКалендарь matching the query, or a new ChildКалендарь object populated from the query conditions when no match is found
 *
 * @method     ChildКалендарь findOneByдата(string $Дата) Return the first ChildКалендарь filtered by the Дата column
 * @method     ChildКалендарь findOneByгод(int $Год) Return the first ChildКалендарь filtered by the Год column
 * @method     ChildКалендарь findOneByполугодие(int $Полугодие) Return the first ChildКалендарь filtered by the Полугодие column
 * @method     ChildКалендарь findOneByквартал(int $Квартал) Return the first ChildКалендарь filtered by the Квартал column
 * @method     ChildКалендарь findOneByномермесяца(int $Номер_месяца) Return the first ChildКалендарь filtered by the Номер_месяца column
 * @method     ChildКалендарь findOneByмесяц(string $Месяц) Return the first ChildКалендарь filtered by the Месяц column
 * @method     ChildКалендарь findOneByдень(int $День) Return the first ChildКалендарь filtered by the День column
 * @method     ChildКалендарь findOneByномернедели(int $Номер_недели) Return the first ChildКалендарь filtered by the Номер_недели column
 * @method     ChildКалендарь findOneByденьнедели(int $День_недели) Return the first ChildКалендарь filtered by the День_недели column
 * @method     ChildКалендарь findOneByденьвгоду(int $День_в_году) Return the first ChildКалендарь filtered by the День_в_году column *

 * @method     ChildКалендарь requirePk($key, ConnectionInterface $con = null) Return the ChildКалендарь by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOne(ConnectionInterface $con = null) Return the first ChildКалендарь matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildКалендарь requireOneByдата(string $Дата) Return the first ChildКалендарь filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByгод(int $Год) Return the first ChildКалендарь filtered by the Год column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByполугодие(int $Полугодие) Return the first ChildКалендарь filtered by the Полугодие column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByквартал(int $Квартал) Return the first ChildКалендарь filtered by the Квартал column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByномермесяца(int $Номер_месяца) Return the first ChildКалендарь filtered by the Номер_месяца column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByмесяц(string $Месяц) Return the first ChildКалендарь filtered by the Месяц column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByдень(int $День) Return the first ChildКалендарь filtered by the День column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByномернедели(int $Номер_недели) Return the first ChildКалендарь filtered by the Номер_недели column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByденьнедели(int $День_недели) Return the first ChildКалендарь filtered by the День_недели column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByденьвгоду(int $День_в_году) Return the first ChildКалендарь filtered by the День_в_году column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildКалендарь[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildКалендарь objects based on current ModelCriteria
 * @method     ChildКалендарь[]|ObjectCollection findByдата(string $Дата) Return ChildКалендарь objects filtered by the Дата column
 * @method     ChildКалендарь[]|ObjectCollection findByгод(int $Год) Return ChildКалендарь objects filtered by the Год column
 * @method     ChildКалендарь[]|ObjectCollection findByполугодие(int $Полугодие) Return ChildКалендарь objects filtered by the Полугодие column
 * @method     ChildКалендарь[]|ObjectCollection findByквартал(int $Квартал) Return ChildКалендарь objects filtered by the Квартал column
 * @method     ChildКалендарь[]|ObjectCollection findByномермесяца(int $Номер_месяца) Return ChildКалендарь objects filtered by the Номер_месяца column
 * @method     ChildКалендарь[]|ObjectCollection findByмесяц(string $Месяц) Return ChildКалендарь objects filtered by the Месяц column
 * @method     ChildКалендарь[]|ObjectCollection findByдень(int $День) Return ChildКалендарь objects filtered by the День column
 * @method     ChildКалендарь[]|ObjectCollection findByномернедели(int $Номер_недели) Return ChildКалендарь objects filtered by the Номер_недели column
 * @method     ChildКалендарь[]|ObjectCollection findByденьнедели(int $День_недели) Return ChildКалендарь objects filtered by the День_недели column
 * @method     ChildКалендарь[]|ObjectCollection findByденьвгоду(int $День_в_году) Return ChildКалендарь objects filtered by the День_в_году column
 * @method     ChildКалендарь[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class КалендарьQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\КалендарьQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Календарь', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildКалендарьQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildКалендарьQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildКалендарьQuery) {
            return $criteria;
        }
        $query = new ChildКалендарьQuery();
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
     * @return ChildКалендарь|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = КалендарьTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(КалендарьTableMap::DATABASE_NAME);
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
     * @return ChildКалендарь A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Дата, Год, Полугодие, Квартал, Номер_месяца, Месяц, День, Номер_недели, День_недели, День_в_году FROM Календарь WHERE Дата = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key ? $key->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildКалендарь $obj */
            $obj = new ChildКалендарь();
            $obj->hydrate($row);
            КалендарьTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildКалендарь|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Дата column
     *
     * Example usage:
     * <code>
     * $query->filterByдата('2011-03-14'); // WHERE Дата = '2011-03-14'
     * $query->filterByдата('now'); // WHERE Дата = '2011-03-14'
     * $query->filterByдата(array('max' => 'yesterday')); // WHERE Дата > '2011-03-13'
     * </code>
     *
     * @param     mixed $�ата The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByдата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�ата, $comparison);
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByгод($�од = null, $comparison = null)
    {
        if (is_array($�од)) {
            $useMinMax = false;
            if (isset($�од['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ГОД, $�од['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�од['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ГОД, $�од['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ГОД, $�од, $comparison);
    }

    /**
     * Filter the query on the Полугодие column
     *
     * Example usage:
     * <code>
     * $query->filterByполугодие(1234); // WHERE Полугодие = 1234
     * $query->filterByполугодие(array(12, 34)); // WHERE Полугодие IN (12, 34)
     * $query->filterByполугодие(array('min' => 12)); // WHERE Полугодие > 12
     * </code>
     *
     * @param     mixed $�олугодие The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByполугодие($�олугодие = null, $comparison = null)
    {
        if (is_array($�олугодие)) {
            $useMinMax = false;
            if (isset($�олугодие['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ПОЛУГОДИЕ, $�олугодие['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�олугодие['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ПОЛУГОДИЕ, $�олугодие['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ПОЛУГОДИЕ, $�олугодие, $comparison);
    }

    /**
     * Filter the query on the Квартал column
     *
     * Example usage:
     * <code>
     * $query->filterByквартал(1234); // WHERE Квартал = 1234
     * $query->filterByквартал(array(12, 34)); // WHERE Квартал IN (12, 34)
     * $query->filterByквартал(array('min' => 12)); // WHERE Квартал > 12
     * </code>
     *
     * @param     mixed $�вартал The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByквартал($�вартал = null, $comparison = null)
    {
        if (is_array($�вартал)) {
            $useMinMax = false;
            if (isset($�вартал['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_КВАРТАЛ, $�вартал['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�вартал['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_КВАРТАЛ, $�вартал['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_КВАРТАЛ, $�вартал, $comparison);
    }

    /**
     * Filter the query on the Номер_месяца column
     *
     * Example usage:
     * <code>
     * $query->filterByномермесяца(1234); // WHERE Номер_месяца = 1234
     * $query->filterByномермесяца(array(12, 34)); // WHERE Номер_месяца IN (12, 34)
     * $query->filterByномермесяца(array('min' => 12)); // WHERE Номер_месяца > 12
     * </code>
     *
     * @see       filterByмесяца()
     *
     * @param     mixed $�омермесяца The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByномермесяца($�омермесяца = null, $comparison = null)
    {
        if (is_array($�омермесяца)) {
            $useMinMax = false;
            if (isset($�омермесяца['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_НОМЕР_МЕСЯЦА, $�омермесяца['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�омермесяца['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_НОМЕР_МЕСЯЦА, $�омермесяца['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_НОМЕР_МЕСЯЦА, $�омермесяца, $comparison);
    }

    /**
     * Filter the query on the Месяц column
     *
     * Example usage:
     * <code>
     * $query->filterByмесяц('fooValue');   // WHERE Месяц = 'fooValue'
     * $query->filterByмесяц('%fooValue%'); // WHERE Месяц LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�есяц The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByмесяц($�есяц = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�есяц)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�есяц)) {
                $�есяц = str_replace('*', '%', $�есяц);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_МЕСЯЦ, $�есяц, $comparison);
    }

    /**
     * Filter the query on the День column
     *
     * Example usage:
     * <code>
     * $query->filterByдень(1234); // WHERE День = 1234
     * $query->filterByдень(array(12, 34)); // WHERE День IN (12, 34)
     * $query->filterByдень(array('min' => 12)); // WHERE День > 12
     * </code>
     *
     * @param     mixed $�ень The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByдень($�ень = null, $comparison = null)
    {
        if (is_array($�ень)) {
            $useMinMax = false;
            if (isset($�ень['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ, $�ень['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ень['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ, $�ень['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ, $�ень, $comparison);
    }

    /**
     * Filter the query on the Номер_недели column
     *
     * Example usage:
     * <code>
     * $query->filterByномернедели(1234); // WHERE Номер_недели = 1234
     * $query->filterByномернедели(array(12, 34)); // WHERE Номер_недели IN (12, 34)
     * $query->filterByномернедели(array('min' => 12)); // WHERE Номер_недели > 12
     * </code>
     *
     * @param     mixed $�омернедели The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByномернедели($�омернедели = null, $comparison = null)
    {
        if (is_array($�омернедели)) {
            $useMinMax = false;
            if (isset($�омернедели['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ, $�омернедели['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�омернедели['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ, $�омернедели['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ, $�омернедели, $comparison);
    }

    /**
     * Filter the query on the День_недели column
     *
     * Example usage:
     * <code>
     * $query->filterByденьнедели(1234); // WHERE День_недели = 1234
     * $query->filterByденьнедели(array(12, 34)); // WHERE День_недели IN (12, 34)
     * $query->filterByденьнедели(array('min' => 12)); // WHERE День_недели > 12
     * </code>
     *
     * @see       filterByднинедели()
     *
     * @param     mixed $�еньнедели The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByденьнедели($�еньнедели = null, $comparison = null)
    {
        if (is_array($�еньнедели)) {
            $useMinMax = false;
            if (isset($�еньнедели['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ, $�еньнедели['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�еньнедели['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ, $�еньнедели['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ, $�еньнедели, $comparison);
    }

    /**
     * Filter the query on the День_в_году column
     *
     * Example usage:
     * <code>
     * $query->filterByденьвгоду(1234); // WHERE День_в_году = 1234
     * $query->filterByденьвгоду(array(12, 34)); // WHERE День_в_году IN (12, 34)
     * $query->filterByденьвгоду(array('min' => 12)); // WHERE День_в_году > 12
     * </code>
     *
     * @param     mixed $�еньвгоду The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByденьвгоду($�еньвгоду = null, $comparison = null)
    {
        if (is_array($�еньвгоду)) {
            $useMinMax = false;
            if (isset($�еньвгоду['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ, $�еньвгоду['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�еньвгоду['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ, $�еньвгоду['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ, $�еньвгоду, $comparison);
    }

    /**
     * Filter the query by a related \года object
     *
     * @param \года|ObjectCollection $�ода The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByгода($�ода, $comparison = null)
    {
        if ($�ода instanceof \года) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ГОД, $�ода->getId(), $comparison);
        } elseif ($�ода instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ГОД, $�ода->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinгода($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useгодаQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinгода($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'года', '\годаQuery');
    }

    /**
     * Filter the query by a related \днинедели object
     *
     * @param \днинедели|ObjectCollection $�нинедели The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByднинедели($�нинедели, $comparison = null)
    {
        if ($�нинедели instanceof \днинедели) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ, $�нинедели->getId(), $comparison);
        } elseif ($�нинедели instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ, $�нинедели->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByднинедели() only accepts arguments of type \днинедели or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the днинедели relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinднинедели($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('днинедели');

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
            $this->addJoinObject($join, 'днинедели');
        }

        return $this;
    }

    /**
     * Use the днинедели relation днинедели object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \днинеделиQuery A secondary query class using the current class as primary query
     */
    public function useднинеделиQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinднинедели($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'днинедели', '\днинеделиQuery');
    }

    /**
     * Filter the query by a related \месяца object
     *
     * @param \месяца|ObjectCollection $�есяца The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByмесяца($�есяца, $comparison = null)
    {
        if ($�есяца instanceof \месяца) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_НОМЕР_МЕСЯЦА, $�есяца->getId(), $comparison);
        } elseif ($�есяца instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(КалендарьTableMap::COL_НОМЕР_МЕСЯЦА, $�есяца->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinмесяца($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useмесяцаQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinмесяца($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'месяца', '\месяцаQuery');
    }

    /**
     * Filter the query by a related \выработка object
     *
     * @param \выработка|ObjectCollection $�ыработка the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByвыработка($�ыработка, $comparison = null)
    {
        if ($�ыработка instanceof \выработка) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�ыработка->getдата(), $comparison);
        } elseif ($�ыработка instanceof ObjectCollection) {
            return $this
                ->useвыработкаQuery()
                ->filterByPrimaryKeys($�ыработка->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByвыработка() only accepts arguments of type \выработка or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the выработка relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinвыработка($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('выработка');

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
            $this->addJoinObject($join, 'выработка');
        }

        return $this;
    }

    /**
     * Use the выработка relation выработка object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \выработкаQuery A secondary query class using the current class as primary query
     */
    public function useвыработкаQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinвыработка($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'выработка', '\выработкаQuery');
    }

    /**
     * Filter the query by a related \датыобновленийдашбордов object
     *
     * @param \датыобновленийдашбордов|ObjectCollection $�атыобновленийдашбордов the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByдатыобновленийдашбордов($�атыобновленийдашбордов, $comparison = null)
    {
        if ($�атыобновленийдашбордов instanceof \датыобновленийдашбордов) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�атыобновленийдашбордов->getдата(), $comparison);
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinдатыобновленийдашбордов($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useдатыобновленийдашбордовQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByмтр($�тр, $comparison = null)
    {
        if ($�тр instanceof \мтр) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�тр->getдата(), $comparison);
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinмтр($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useмтрQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByмобилизация($�обилизация, $comparison = null)
    {
        if ($�обилизация instanceof \мобилизация) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�обилизация->getдатаотчёта(), $comparison);
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
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
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByмобилизацияпомесяцам($�обилизацияпомесяцам, $comparison = null)
    {
        if ($�обилизацияпомесяцам instanceof \мобилизацияпомесяцам) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�обилизацияпомесяцам->getдатаотчёта(), $comparison);
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
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
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByПредписанияRelatedByдатавыдачи($�редписания, $comparison = null)
    {
        if ($�редписания instanceof \Предписания) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�редписания->getдатавыдачи(), $comparison);
        } elseif ($�редписания instanceof ObjectCollection) {
            return $this
                ->useПредписанияRelatedByдатавыдачиQuery()
                ->filterByPrimaryKeys($�редписания->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByПредписанияRelatedByдатавыдачи() only accepts arguments of type \Предписания or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ПредписанияRelatedByдатавыдачи relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinПредписанияRelatedByдатавыдачи($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ПредписанияRelatedByдатавыдачи');

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
            $this->addJoinObject($join, 'ПредписанияRelatedByдатавыдачи');
        }

        return $this;
    }

    /**
     * Use the ПредписанияRelatedByдатавыдачи relation Предписания object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ПредписанияQuery A secondary query class using the current class as primary query
     */
    public function useПредписанияRelatedByдатавыдачиQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinПредписанияRelatedByдатавыдачи($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ПредписанияRelatedByдатавыдачи', '\ПредписанияQuery');
    }

    /**
     * Filter the query by a related \Предписания object
     *
     * @param \Предписания|ObjectCollection $�редписания the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByПредписанияRelatedByплановаядатаустранения($�редписания, $comparison = null)
    {
        if ($�редписания instanceof \Предписания) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�редписания->getплановаядатаустранения(), $comparison);
        } elseif ($�редписания instanceof ObjectCollection) {
            return $this
                ->useПредписанияRelatedByплановаядатаустраненияQuery()
                ->filterByPrimaryKeys($�редписания->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByПредписанияRelatedByплановаядатаустранения() only accepts arguments of type \Предписания or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ПредписанияRelatedByплановаядатаустранения relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinПредписанияRelatedByплановаядатаустранения($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ПредписанияRelatedByплановаядатаустранения');

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
            $this->addJoinObject($join, 'ПредписанияRelatedByплановаядатаустранения');
        }

        return $this;
    }

    /**
     * Use the ПредписанияRelatedByплановаядатаустранения relation Предписания object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ПредписанияQuery A secondary query class using the current class as primary query
     */
    public function useПредписанияRelatedByплановаядатаустраненияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinПредписанияRelatedByплановаядатаустранения($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ПредписанияRelatedByплановаядатаустранения', '\ПредписанияQuery');
    }

    /**
     * Filter the query by a related \Предписания object
     *
     * @param \Предписания|ObjectCollection $�редписания the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByПредписанияRelatedByфактическаядатаустранения($�редписания, $comparison = null)
    {
        if ($�редписания instanceof \Предписания) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�редписания->getфактическаядатаустранения(), $comparison);
        } elseif ($�редписания instanceof ObjectCollection) {
            return $this
                ->useПредписанияRelatedByфактическаядатаустраненияQuery()
                ->filterByPrimaryKeys($�редписания->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByПредписанияRelatedByфактическаядатаустранения() only accepts arguments of type \Предписания or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ПредписанияRelatedByфактическаядатаустранения relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinПредписанияRelatedByфактическаядатаустранения($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ПредписанияRelatedByфактическаядатаустранения');

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
            $this->addJoinObject($join, 'ПредписанияRelatedByфактическаядатаустранения');
        }

        return $this;
    }

    /**
     * Use the ПредписанияRelatedByфактическаядатаустранения relation Предписания object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ПредписанияQuery A secondary query class using the current class as primary query
     */
    public function useПредписанияRelatedByфактическаядатаустраненияQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinПредписанияRelatedByфактическаядатаустранения($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ПредписанияRelatedByфактическаядатаустранения', '\ПредписанияQuery');
    }

    /**
     * Filter the query by a related \физическиеобъёмы object
     *
     * @param \физическиеобъёмы|ObjectCollection $�изическиеобъёмы the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByфизическиеобъёмы($�изическиеобъёмы, $comparison = null)
    {
        if ($�изическиеобъёмы instanceof \физическиеобъёмы) {
            return $this
                ->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�изическиеобъёмы->getдата(), $comparison);
        } elseif ($�изическиеобъёмы instanceof ObjectCollection) {
            return $this
                ->useфизическиеобъёмыQuery()
                ->filterByPrimaryKeys($�изическиеобъёмы->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByфизическиеобъёмы() only accepts arguments of type \физическиеобъёмы or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the физическиеобъёмы relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function joinфизическиеобъёмы($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('физическиеобъёмы');

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
            $this->addJoinObject($join, 'физическиеобъёмы');
        }

        return $this;
    }

    /**
     * Use the физическиеобъёмы relation физическиеобъёмы object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \физическиеобъёмыQuery A secondary query class using the current class as primary query
     */
    public function useфизическиеобъёмыQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinфизическиеобъёмы($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'физическиеобъёмы', '\физическиеобъёмыQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildКалендарь $�алендарь Object to remove from the list of results
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function prune($�алендарь = null)
    {
        if ($�алендарь) {
            $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�алендарь->getдата(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Календарь table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(КалендарьTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            КалендарьTableMap::clearInstancePool();
            КалендарьTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(КалендарьTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(КалендарьTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            КалендарьTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            КалендарьTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // КалендарьQuery
