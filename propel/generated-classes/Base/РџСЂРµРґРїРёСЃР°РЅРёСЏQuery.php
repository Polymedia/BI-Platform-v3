<?php

namespace Base;

use \Предписания as ChildПредписания;
use \ПредписанияQuery as ChildПредписанияQuery;
use \Exception;
use \PDO;
use Map\ПредписанияTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Предписания' table.
 *
 * 
 *
 * @method     ChildПредписанияQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildПредписанияQuery orderByконтролирующийорган($order = Criteria::ASC) Order by the Контролирующий_орган column
 * @method     ChildПредписанияQuery orderByподрядчик($order = Criteria::ASC) Order by the Подрядчик column
 * @method     ChildПредписанияQuery orderByдатавыдачи($order = Criteria::ASC) Order by the Дата_выдачи column
 * @method     ChildПредписанияQuery orderByплановаядатаустранения($order = Criteria::ASC) Order by the Плановая_дата_устранения column
 * @method     ChildПредписанияQuery orderByфактическаядатаустранения($order = Criteria::ASC) Order by the Фактическая_дата_устранения column
 * @method     ChildПредписанияQuery orderByтипзамечания($order = Criteria::ASC) Order by the Тип_замечания column
 * @method     ChildПредписанияQuery orderByпроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildПредписанияQuery orderByстатусзаявкизавершение($order = Criteria::ASC) Order by the Статус_заявки_завершение column
 * @method     ChildПредписанияQuery orderByстатусзаявкипросрочка($order = Criteria::ASC) Order by the Статус_заявки_просрочка column
 *
 * @method     ChildПредписанияQuery groupById() Group by the id column
 * @method     ChildПредписанияQuery groupByконтролирующийорган() Group by the Контролирующий_орган column
 * @method     ChildПредписанияQuery groupByподрядчик() Group by the Подрядчик column
 * @method     ChildПредписанияQuery groupByдатавыдачи() Group by the Дата_выдачи column
 * @method     ChildПредписанияQuery groupByплановаядатаустранения() Group by the Плановая_дата_устранения column
 * @method     ChildПредписанияQuery groupByфактическаядатаустранения() Group by the Фактическая_дата_устранения column
 * @method     ChildПредписанияQuery groupByтипзамечания() Group by the Тип_замечания column
 * @method     ChildПредписанияQuery groupByпроект() Group by the Проект column
 * @method     ChildПредписанияQuery groupByстатусзаявкизавершение() Group by the Статус_заявки_завершение column
 * @method     ChildПредписанияQuery groupByстатусзаявкипросрочка() Group by the Статус_заявки_просрочка column
 *
 * @method     ChildПредписанияQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildПредписанияQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildПредписанияQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildПредписанияQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildПредписанияQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildПредписанияQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildПредписанияQuery leftJoinКалендарьRelatedByдатавыдачи($relationAlias = null) Adds a LEFT JOIN clause to the query using the КалендарьRelatedByдатавыдачи relation
 * @method     ChildПредписанияQuery rightJoinКалендарьRelatedByдатавыдачи($relationAlias = null) Adds a RIGHT JOIN clause to the query using the КалендарьRelatedByдатавыдачи relation
 * @method     ChildПредписанияQuery innerJoinКалендарьRelatedByдатавыдачи($relationAlias = null) Adds a INNER JOIN clause to the query using the КалендарьRelatedByдатавыдачи relation
 *
 * @method     ChildПредписанияQuery joinWithКалендарьRelatedByдатавыдачи($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the КалендарьRelatedByдатавыдачи relation
 *
 * @method     ChildПредписанияQuery leftJoinWithКалендарьRelatedByдатавыдачи() Adds a LEFT JOIN clause and with to the query using the КалендарьRelatedByдатавыдачи relation
 * @method     ChildПредписанияQuery rightJoinWithКалендарьRelatedByдатавыдачи() Adds a RIGHT JOIN clause and with to the query using the КалендарьRelatedByдатавыдачи relation
 * @method     ChildПредписанияQuery innerJoinWithКалендарьRelatedByдатавыдачи() Adds a INNER JOIN clause and with to the query using the КалендарьRelatedByдатавыдачи relation
 *
 * @method     ChildПредписанияQuery leftJoinКонтролирующиеОрганы($relationAlias = null) Adds a LEFT JOIN clause to the query using the КонтролирующиеОрганы relation
 * @method     ChildПредписанияQuery rightJoinКонтролирующиеОрганы($relationAlias = null) Adds a RIGHT JOIN clause to the query using the КонтролирующиеОрганы relation
 * @method     ChildПредписанияQuery innerJoinКонтролирующиеОрганы($relationAlias = null) Adds a INNER JOIN clause to the query using the КонтролирующиеОрганы relation
 *
 * @method     ChildПредписанияQuery joinWithКонтролирующиеОрганы($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the КонтролирующиеОрганы relation
 *
 * @method     ChildПредписанияQuery leftJoinWithКонтролирующиеОрганы() Adds a LEFT JOIN clause and with to the query using the КонтролирующиеОрганы relation
 * @method     ChildПредписанияQuery rightJoinWithКонтролирующиеОрганы() Adds a RIGHT JOIN clause and with to the query using the КонтролирующиеОрганы relation
 * @method     ChildПредписанияQuery innerJoinWithКонтролирующиеОрганы() Adds a INNER JOIN clause and with to the query using the КонтролирующиеОрганы relation
 *
 * @method     ChildПредписанияQuery leftJoinКалендарьRelatedByплановаядатаустранения($relationAlias = null) Adds a LEFT JOIN clause to the query using the КалендарьRelatedByплановаядатаустранения relation
 * @method     ChildПредписанияQuery rightJoinКалендарьRelatedByплановаядатаустранения($relationAlias = null) Adds a RIGHT JOIN clause to the query using the КалендарьRelatedByплановаядатаустранения relation
 * @method     ChildПредписанияQuery innerJoinКалендарьRelatedByплановаядатаустранения($relationAlias = null) Adds a INNER JOIN clause to the query using the КалендарьRelatedByплановаядатаустранения relation
 *
 * @method     ChildПредписанияQuery joinWithКалендарьRelatedByплановаядатаустранения($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the КалендарьRelatedByплановаядатаустранения relation
 *
 * @method     ChildПредписанияQuery leftJoinWithКалендарьRelatedByплановаядатаустранения() Adds a LEFT JOIN clause and with to the query using the КалендарьRelatedByплановаядатаустранения relation
 * @method     ChildПредписанияQuery rightJoinWithКалендарьRelatedByплановаядатаустранения() Adds a RIGHT JOIN clause and with to the query using the КалендарьRelatedByплановаядатаустранения relation
 * @method     ChildПредписанияQuery innerJoinWithКалендарьRelatedByплановаядатаустранения() Adds a INNER JOIN clause and with to the query using the КалендарьRelatedByплановаядатаустранения relation
 *
 * @method     ChildПредписанияQuery leftJoinПодрядчикиПредписания($relationAlias = null) Adds a LEFT JOIN clause to the query using the ПодрядчикиПредписания relation
 * @method     ChildПредписанияQuery rightJoinПодрядчикиПредписания($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ПодрядчикиПредписания relation
 * @method     ChildПредписанияQuery innerJoinПодрядчикиПредписания($relationAlias = null) Adds a INNER JOIN clause to the query using the ПодрядчикиПредписания relation
 *
 * @method     ChildПредписанияQuery joinWithПодрядчикиПредписания($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ПодрядчикиПредписания relation
 *
 * @method     ChildПредписанияQuery leftJoinWithПодрядчикиПредписания() Adds a LEFT JOIN clause and with to the query using the ПодрядчикиПредписания relation
 * @method     ChildПредписанияQuery rightJoinWithПодрядчикиПредписания() Adds a RIGHT JOIN clause and with to the query using the ПодрядчикиПредписания relation
 * @method     ChildПредписанияQuery innerJoinWithПодрядчикиПредписания() Adds a INNER JOIN clause and with to the query using the ПодрядчикиПредписания relation
 *
 * @method     ChildПредписанияQuery leftJoinПроекты($relationAlias = null) Adds a LEFT JOIN clause to the query using the Проекты relation
 * @method     ChildПредписанияQuery rightJoinПроекты($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Проекты relation
 * @method     ChildПредписанияQuery innerJoinПроекты($relationAlias = null) Adds a INNER JOIN clause to the query using the Проекты relation
 *
 * @method     ChildПредписанияQuery joinWithПроекты($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Проекты relation
 *
 * @method     ChildПредписанияQuery leftJoinWithПроекты() Adds a LEFT JOIN clause and with to the query using the Проекты relation
 * @method     ChildПредписанияQuery rightJoinWithПроекты() Adds a RIGHT JOIN clause and with to the query using the Проекты relation
 * @method     ChildПредписанияQuery innerJoinWithПроекты() Adds a INNER JOIN clause and with to the query using the Проекты relation
 *
 * @method     ChildПредписанияQuery leftJoinСтатусыЗаявкиЗавершение($relationAlias = null) Adds a LEFT JOIN clause to the query using the СтатусыЗаявкиЗавершение relation
 * @method     ChildПредписанияQuery rightJoinСтатусыЗаявкиЗавершение($relationAlias = null) Adds a RIGHT JOIN clause to the query using the СтатусыЗаявкиЗавершение relation
 * @method     ChildПредписанияQuery innerJoinСтатусыЗаявкиЗавершение($relationAlias = null) Adds a INNER JOIN clause to the query using the СтатусыЗаявкиЗавершение relation
 *
 * @method     ChildПредписанияQuery joinWithСтатусыЗаявкиЗавершение($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the СтатусыЗаявкиЗавершение relation
 *
 * @method     ChildПредписанияQuery leftJoinWithСтатусыЗаявкиЗавершение() Adds a LEFT JOIN clause and with to the query using the СтатусыЗаявкиЗавершение relation
 * @method     ChildПредписанияQuery rightJoinWithСтатусыЗаявкиЗавершение() Adds a RIGHT JOIN clause and with to the query using the СтатусыЗаявкиЗавершение relation
 * @method     ChildПредписанияQuery innerJoinWithСтатусыЗаявкиЗавершение() Adds a INNER JOIN clause and with to the query using the СтатусыЗаявкиЗавершение relation
 *
 * @method     ChildПредписанияQuery leftJoinСтатусыЗаявкиПросрочка($relationAlias = null) Adds a LEFT JOIN clause to the query using the СтатусыЗаявкиПросрочка relation
 * @method     ChildПредписанияQuery rightJoinСтатусыЗаявкиПросрочка($relationAlias = null) Adds a RIGHT JOIN clause to the query using the СтатусыЗаявкиПросрочка relation
 * @method     ChildПредписанияQuery innerJoinСтатусыЗаявкиПросрочка($relationAlias = null) Adds a INNER JOIN clause to the query using the СтатусыЗаявкиПросрочка relation
 *
 * @method     ChildПредписанияQuery joinWithСтатусыЗаявкиПросрочка($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the СтатусыЗаявкиПросрочка relation
 *
 * @method     ChildПредписанияQuery leftJoinWithСтатусыЗаявкиПросрочка() Adds a LEFT JOIN clause and with to the query using the СтатусыЗаявкиПросрочка relation
 * @method     ChildПредписанияQuery rightJoinWithСтатусыЗаявкиПросрочка() Adds a RIGHT JOIN clause and with to the query using the СтатусыЗаявкиПросрочка relation
 * @method     ChildПредписанияQuery innerJoinWithСтатусыЗаявкиПросрочка() Adds a INNER JOIN clause and with to the query using the СтатусыЗаявкиПросрочка relation
 *
 * @method     ChildПредписанияQuery leftJoinТипыЗамечаний($relationAlias = null) Adds a LEFT JOIN clause to the query using the ТипыЗамечаний relation
 * @method     ChildПредписанияQuery rightJoinТипыЗамечаний($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ТипыЗамечаний relation
 * @method     ChildПредписанияQuery innerJoinТипыЗамечаний($relationAlias = null) Adds a INNER JOIN clause to the query using the ТипыЗамечаний relation
 *
 * @method     ChildПредписанияQuery joinWithТипыЗамечаний($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ТипыЗамечаний relation
 *
 * @method     ChildПредписанияQuery leftJoinWithТипыЗамечаний() Adds a LEFT JOIN clause and with to the query using the ТипыЗамечаний relation
 * @method     ChildПредписанияQuery rightJoinWithТипыЗамечаний() Adds a RIGHT JOIN clause and with to the query using the ТипыЗамечаний relation
 * @method     ChildПредписанияQuery innerJoinWithТипыЗамечаний() Adds a INNER JOIN clause and with to the query using the ТипыЗамечаний relation
 *
 * @method     ChildПредписанияQuery leftJoinКалендарьRelatedByфактическаядатаустранения($relationAlias = null) Adds a LEFT JOIN clause to the query using the КалендарьRelatedByфактическаядатаустранения relation
 * @method     ChildПредписанияQuery rightJoinКалендарьRelatedByфактическаядатаустранения($relationAlias = null) Adds a RIGHT JOIN clause to the query using the КалендарьRelatedByфактическаядатаустранения relation
 * @method     ChildПредписанияQuery innerJoinКалендарьRelatedByфактическаядатаустранения($relationAlias = null) Adds a INNER JOIN clause to the query using the КалендарьRelatedByфактическаядатаустранения relation
 *
 * @method     ChildПредписанияQuery joinWithКалендарьRelatedByфактическаядатаустранения($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the КалендарьRelatedByфактическаядатаустранения relation
 *
 * @method     ChildПредписанияQuery leftJoinWithКалендарьRelatedByфактическаядатаустранения() Adds a LEFT JOIN clause and with to the query using the КалендарьRelatedByфактическаядатаустранения relation
 * @method     ChildПредписанияQuery rightJoinWithКалендарьRelatedByфактическаядатаустранения() Adds a RIGHT JOIN clause and with to the query using the КалендарьRelatedByфактическаядатаустранения relation
 * @method     ChildПредписанияQuery innerJoinWithКалендарьRelatedByфактическаядатаустранения() Adds a INNER JOIN clause and with to the query using the КалендарьRelatedByфактическаядатаустранения relation
 *
 * @method     \КалендарьQuery|\КонтролирующиеОрганыQuery|\ПодрядчикиПредписанияQuery|\ПроектыQuery|\СтатусыЗаявкиЗавершениеQuery|\СтатусыЗаявкиПросрочкаQuery|\ТипыЗамечанийQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildПредписания findOne(ConnectionInterface $con = null) Return the first ChildПредписания matching the query
 * @method     ChildПредписания findOneOrCreate(ConnectionInterface $con = null) Return the first ChildПредписания matching the query, or a new ChildПредписания object populated from the query conditions when no match is found
 *
 * @method     ChildПредписания findOneById(int $id) Return the first ChildПредписания filtered by the id column
 * @method     ChildПредписания findOneByконтролирующийорган(int $Контролирующий_орган) Return the first ChildПредписания filtered by the Контролирующий_орган column
 * @method     ChildПредписания findOneByподрядчик(int $Подрядчик) Return the first ChildПредписания filtered by the Подрядчик column
 * @method     ChildПредписания findOneByдатавыдачи(string $Дата_выдачи) Return the first ChildПредписания filtered by the Дата_выдачи column
 * @method     ChildПредписания findOneByплановаядатаустранения(string $Плановая_дата_устранения) Return the first ChildПредписания filtered by the Плановая_дата_устранения column
 * @method     ChildПредписания findOneByфактическаядатаустранения(string $Фактическая_дата_устранения) Return the first ChildПредписания filtered by the Фактическая_дата_устранения column
 * @method     ChildПредписания findOneByтипзамечания(int $Тип_замечания) Return the first ChildПредписания filtered by the Тип_замечания column
 * @method     ChildПредписания findOneByпроект(int $Проект) Return the first ChildПредписания filtered by the Проект column
 * @method     ChildПредписания findOneByстатусзаявкизавершение(int $Статус_заявки_завершение) Return the first ChildПредписания filtered by the Статус_заявки_завершение column
 * @method     ChildПредписания findOneByстатусзаявкипросрочка(int $Статус_заявки_просрочка) Return the first ChildПредписания filtered by the Статус_заявки_просрочка column *

 * @method     ChildПредписания requirePk($key, ConnectionInterface $con = null) Return the ChildПредписания by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOne(ConnectionInterface $con = null) Return the first ChildПредписания matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПредписания requireOneById(int $id) Return the first ChildПредписания filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByконтролирующийорган(int $Контролирующий_орган) Return the first ChildПредписания filtered by the Контролирующий_орган column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByподрядчик(int $Подрядчик) Return the first ChildПредписания filtered by the Подрядчик column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByдатавыдачи(string $Дата_выдачи) Return the first ChildПредписания filtered by the Дата_выдачи column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByплановаядатаустранения(string $Плановая_дата_устранения) Return the first ChildПредписания filtered by the Плановая_дата_устранения column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByфактическаядатаустранения(string $Фактическая_дата_устранения) Return the first ChildПредписания filtered by the Фактическая_дата_устранения column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByтипзамечания(int $Тип_замечания) Return the first ChildПредписания filtered by the Тип_замечания column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByпроект(int $Проект) Return the first ChildПредписания filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByстатусзаявкизавершение(int $Статус_заявки_завершение) Return the first ChildПредписания filtered by the Статус_заявки_завершение column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByстатусзаявкипросрочка(int $Статус_заявки_просрочка) Return the first ChildПредписания filtered by the Статус_заявки_просрочка column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПредписания[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildПредписания objects based on current ModelCriteria
 * @method     ChildПредписания[]|ObjectCollection findById(int $id) Return ChildПредписания objects filtered by the id column
 * @method     ChildПредписания[]|ObjectCollection findByконтролирующийорган(int $Контролирующий_орган) Return ChildПредписания objects filtered by the Контролирующий_орган column
 * @method     ChildПредписания[]|ObjectCollection findByподрядчик(int $Подрядчик) Return ChildПредписания objects filtered by the Подрядчик column
 * @method     ChildПредписания[]|ObjectCollection findByдатавыдачи(string $Дата_выдачи) Return ChildПредписания objects filtered by the Дата_выдачи column
 * @method     ChildПредписания[]|ObjectCollection findByплановаядатаустранения(string $Плановая_дата_устранения) Return ChildПредписания objects filtered by the Плановая_дата_устранения column
 * @method     ChildПредписания[]|ObjectCollection findByфактическаядатаустранения(string $Фактическая_дата_устранения) Return ChildПредписания objects filtered by the Фактическая_дата_устранения column
 * @method     ChildПредписания[]|ObjectCollection findByтипзамечания(int $Тип_замечания) Return ChildПредписания objects filtered by the Тип_замечания column
 * @method     ChildПредписания[]|ObjectCollection findByпроект(int $Проект) Return ChildПредписания objects filtered by the Проект column
 * @method     ChildПредписания[]|ObjectCollection findByстатусзаявкизавершение(int $Статус_заявки_завершение) Return ChildПредписания objects filtered by the Статус_заявки_завершение column
 * @method     ChildПредписания[]|ObjectCollection findByстатусзаявкипросрочка(int $Статус_заявки_просрочка) Return ChildПредписания objects filtered by the Статус_заявки_просрочка column
 * @method     ChildПредписания[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ПредписанияQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ПредписанияQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Предписания', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildПредписанияQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildПредписанияQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildПредписанияQuery) {
            return $criteria;
        }
        $query = new ChildПредписанияQuery();
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
     * @return ChildПредписания|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ПредписанияTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ПредписанияTableMap::DATABASE_NAME);
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
     * @return ChildПредписания A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Контролирующий_орган, Подрядчик, Дата_выдачи, Плановая_дата_устранения, Фактическая_дата_устранения, Тип_замечания, Проект, Статус_заявки_завершение, Статус_заявки_просрочка FROM Предписания WHERE id = :p0';
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
            /** @var ChildПредписания $obj */
            $obj = new ChildПредписания();
            $obj->hydrate($row);
            ПредписанияTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildПредписания|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ПредписанияTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ПредписанияTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Контролирующий_орган column
     *
     * Example usage:
     * <code>
     * $query->filterByконтролирующийорган(1234); // WHERE Контролирующий_орган = 1234
     * $query->filterByконтролирующийорган(array(12, 34)); // WHERE Контролирующий_орган IN (12, 34)
     * $query->filterByконтролирующийорган(array('min' => 12)); // WHERE Контролирующий_орган > 12
     * </code>
     *
     * @see       filterByКонтролирующиеОрганы()
     *
     * @param     mixed $�онтролирующийорган The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByконтролирующийорган($�онтролирующийорган = null, $comparison = null)
    {
        if (is_array($�онтролирующийорган)) {
            $useMinMax = false;
            if (isset($�онтролирующийорган['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙ_ОРГАН, $�онтролирующийорган['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�онтролирующийорган['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙ_ОРГАН, $�онтролирующийорган['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙ_ОРГАН, $�онтролирующийорган, $comparison);
    }

    /**
     * Filter the query on the Подрядчик column
     *
     * Example usage:
     * <code>
     * $query->filterByподрядчик(1234); // WHERE Подрядчик = 1234
     * $query->filterByподрядчик(array(12, 34)); // WHERE Подрядчик IN (12, 34)
     * $query->filterByподрядчик(array('min' => 12)); // WHERE Подрядчик > 12
     * </code>
     *
     * @see       filterByПодрядчикиПредписания()
     *
     * @param     mixed $�одрядчик The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByподрядчик($�одрядчик = null, $comparison = null)
    {
        if (is_array($�одрядчик)) {
            $useMinMax = false;
            if (isset($�одрядчик['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПОДРЯДЧИК, $�одрядчик['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�одрядчик['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПОДРЯДЧИК, $�одрядчик['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ПОДРЯДЧИК, $�одрядчик, $comparison);
    }

    /**
     * Filter the query on the Дата_выдачи column
     *
     * Example usage:
     * <code>
     * $query->filterByдатавыдачи('2011-03-14'); // WHERE Дата_выдачи = '2011-03-14'
     * $query->filterByдатавыдачи('now'); // WHERE Дата_выдачи = '2011-03-14'
     * $query->filterByдатавыдачи(array('max' => 'yesterday')); // WHERE Дата_выдачи > '2011-03-13'
     * </code>
     *
     * @param     mixed $�атавыдачи The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByдатавыдачи($�атавыдачи = null, $comparison = null)
    {
        if (is_array($�атавыдачи)) {
            $useMinMax = false;
            if (isset($�атавыдачи['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ДАТА_ВЫДАЧИ, $�атавыдачи['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�атавыдачи['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ДАТА_ВЫДАЧИ, $�атавыдачи['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ДАТА_ВЫДАЧИ, $�атавыдачи, $comparison);
    }

    /**
     * Filter the query on the Плановая_дата_устранения column
     *
     * Example usage:
     * <code>
     * $query->filterByплановаядатаустранения('2011-03-14'); // WHERE Плановая_дата_устранения = '2011-03-14'
     * $query->filterByплановаядатаустранения('now'); // WHERE Плановая_дата_устранения = '2011-03-14'
     * $query->filterByплановаядатаустранения(array('max' => 'yesterday')); // WHERE Плановая_дата_устранения > '2011-03-13'
     * </code>
     *
     * @param     mixed $�лановаядатаустранения The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByплановаядатаустранения($�лановаядатаустранения = null, $comparison = null)
    {
        if (is_array($�лановаядатаустранения)) {
            $useMinMax = false;
            if (isset($�лановаядатаустранения['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПЛАНОВАЯ_ДАТА_УСТРАНЕНИЯ, $�лановаядатаустранения['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�лановаядатаустранения['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПЛАНОВАЯ_ДАТА_УСТРАНЕНИЯ, $�лановаядатаустранения['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ПЛАНОВАЯ_ДАТА_УСТРАНЕНИЯ, $�лановаядатаустранения, $comparison);
    }

    /**
     * Filter the query on the Фактическая_дата_устранения column
     *
     * Example usage:
     * <code>
     * $query->filterByфактическаядатаустранения('2011-03-14'); // WHERE Фактическая_дата_устранения = '2011-03-14'
     * $query->filterByфактическаядатаустранения('now'); // WHERE Фактическая_дата_устранения = '2011-03-14'
     * $query->filterByфактическаядатаустранения(array('max' => 'yesterday')); // WHERE Фактическая_дата_устранения > '2011-03-13'
     * </code>
     *
     * @param     mixed $�актическаядатаустранения The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByфактическаядатаустранения($�актическаядатаустранения = null, $comparison = null)
    {
        if (is_array($�актическаядатаустранения)) {
            $useMinMax = false;
            if (isset($�актическаядатаустранения['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯ_ДАТА_УСТРАНЕНИЯ, $�актическаядатаустранения['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актическаядатаустранения['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯ_ДАТА_УСТРАНЕНИЯ, $�актическаядатаустранения['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯ_ДАТА_УСТРАНЕНИЯ, $�актическаядатаустранения, $comparison);
    }

    /**
     * Filter the query on the Тип_замечания column
     *
     * Example usage:
     * <code>
     * $query->filterByтипзамечания(1234); // WHERE Тип_замечания = 1234
     * $query->filterByтипзамечания(array(12, 34)); // WHERE Тип_замечания IN (12, 34)
     * $query->filterByтипзамечания(array('min' => 12)); // WHERE Тип_замечания > 12
     * </code>
     *
     * @see       filterByТипыЗамечаний()
     *
     * @param     mixed $�ипзамечания The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByтипзамечания($�ипзамечания = null, $comparison = null)
    {
        if (is_array($�ипзамечания)) {
            $useMinMax = false;
            if (isset($�ипзамечания['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ТИП_ЗАМЕЧАНИЯ, $�ипзамечания['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ипзамечания['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ТИП_ЗАМЕЧАНИЯ, $�ипзамечания['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ТИП_ЗАМЕЧАНИЯ, $�ипзамечания, $comparison);
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
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByпроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query on the Статус_заявки_завершение column
     *
     * Example usage:
     * <code>
     * $query->filterByстатусзаявкизавершение(1234); // WHERE Статус_заявки_завершение = 1234
     * $query->filterByстатусзаявкизавершение(array(12, 34)); // WHERE Статус_заявки_завершение IN (12, 34)
     * $query->filterByстатусзаявкизавершение(array('min' => 12)); // WHERE Статус_заявки_завершение > 12
     * </code>
     *
     * @see       filterByСтатусыЗаявкиЗавершение()
     *
     * @param     mixed $�татусзаявкизавершение The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByстатусзаявкизавершение($�татусзаявкизавершение = null, $comparison = null)
    {
        if (is_array($�татусзаявкизавершение)) {
            $useMinMax = false;
            if (isset($�татусзаявкизавершение['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ЗАВЕРШЕНИЕ, $�татусзаявкизавершение['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�татусзаявкизавершение['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ЗАВЕРШЕНИЕ, $�татусзаявкизавершение['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ЗАВЕРШЕНИЕ, $�татусзаявкизавершение, $comparison);
    }

    /**
     * Filter the query on the Статус_заявки_просрочка column
     *
     * Example usage:
     * <code>
     * $query->filterByстатусзаявкипросрочка(1234); // WHERE Статус_заявки_просрочка = 1234
     * $query->filterByстатусзаявкипросрочка(array(12, 34)); // WHERE Статус_заявки_просрочка IN (12, 34)
     * $query->filterByстатусзаявкипросрочка(array('min' => 12)); // WHERE Статус_заявки_просрочка > 12
     * </code>
     *
     * @see       filterByСтатусыЗаявкиПросрочка()
     *
     * @param     mixed $�татусзаявкипросрочка The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByстатусзаявкипросрочка($�татусзаявкипросрочка = null, $comparison = null)
    {
        if (is_array($�татусзаявкипросрочка)) {
            $useMinMax = false;
            if (isset($�татусзаявкипросрочка['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ПРОСРОЧКА, $�татусзаявкипросрочка['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�татусзаявкипросрочка['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ПРОСРОЧКА, $�татусзаявкипросрочка['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ПРОСРОЧКА, $�татусзаявкипросрочка, $comparison);
    }

    /**
     * Filter the query by a related \Календарь object
     *
     * @param \Календарь|ObjectCollection $�алендарь The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByКалендарьRelatedByдатавыдачи($�алендарь, $comparison = null)
    {
        if ($�алендарь instanceof \Календарь) {
            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ДАТА_ВЫДАЧИ, $�алендарь->getдата(), $comparison);
        } elseif ($�алендарь instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ДАТА_ВЫДАЧИ, $�алендарь->toKeyValue('PrimaryKey', 'дата'), $comparison);
        } else {
            throw new PropelException('filterByКалендарьRelatedByдатавыдачи() only accepts arguments of type \Календарь or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the КалендарьRelatedByдатавыдачи relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function joinКалендарьRelatedByдатавыдачи($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('КалендарьRelatedByдатавыдачи');

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
            $this->addJoinObject($join, 'КалендарьRelatedByдатавыдачи');
        }

        return $this;
    }

    /**
     * Use the КалендарьRelatedByдатавыдачи relation Календарь object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \КалендарьQuery A secondary query class using the current class as primary query
     */
    public function useКалендарьRelatedByдатавыдачиQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinКалендарьRelatedByдатавыдачи($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'КалендарьRelatedByдатавыдачи', '\КалендарьQuery');
    }

    /**
     * Filter the query by a related \КонтролирующиеОрганы object
     *
     * @param \КонтролирующиеОрганы|ObjectCollection $�онтролирующиеОрганы The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByКонтролирующиеОрганы($�онтролирующиеОрганы, $comparison = null)
    {
        if ($�онтролирующиеОрганы instanceof \КонтролирующиеОрганы) {
            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙ_ОРГАН, $�онтролирующиеОрганы->getId(), $comparison);
        } elseif ($�онтролирующиеОрганы instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙ_ОРГАН, $�онтролирующиеОрганы->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByКонтролирующиеОрганы() only accepts arguments of type \КонтролирующиеОрганы or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the КонтролирующиеОрганы relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function joinКонтролирующиеОрганы($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('КонтролирующиеОрганы');

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
            $this->addJoinObject($join, 'КонтролирующиеОрганы');
        }

        return $this;
    }

    /**
     * Use the КонтролирующиеОрганы relation КонтролирующиеОрганы object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \КонтролирующиеОрганыQuery A secondary query class using the current class as primary query
     */
    public function useКонтролирующиеОрганыQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinКонтролирующиеОрганы($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'КонтролирующиеОрганы', '\КонтролирующиеОрганыQuery');
    }

    /**
     * Filter the query by a related \Календарь object
     *
     * @param \Календарь|ObjectCollection $�алендарь The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByКалендарьRelatedByплановаядатаустранения($�алендарь, $comparison = null)
    {
        if ($�алендарь instanceof \Календарь) {
            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ПЛАНОВАЯ_ДАТА_УСТРАНЕНИЯ, $�алендарь->getдата(), $comparison);
        } elseif ($�алендарь instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ПЛАНОВАЯ_ДАТА_УСТРАНЕНИЯ, $�алендарь->toKeyValue('PrimaryKey', 'дата'), $comparison);
        } else {
            throw new PropelException('filterByКалендарьRelatedByплановаядатаустранения() only accepts arguments of type \Календарь or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the КалендарьRelatedByплановаядатаустранения relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function joinКалендарьRelatedByплановаядатаустранения($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('КалендарьRelatedByплановаядатаустранения');

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
            $this->addJoinObject($join, 'КалендарьRelatedByплановаядатаустранения');
        }

        return $this;
    }

    /**
     * Use the КалендарьRelatedByплановаядатаустранения relation Календарь object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \КалендарьQuery A secondary query class using the current class as primary query
     */
    public function useКалендарьRelatedByплановаядатаустраненияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinКалендарьRelatedByплановаядатаустранения($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'КалендарьRelatedByплановаядатаустранения', '\КалендарьQuery');
    }

    /**
     * Filter the query by a related \ПодрядчикиПредписания object
     *
     * @param \ПодрядчикиПредписания|ObjectCollection $�одрядчикиПредписания The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByПодрядчикиПредписания($�одрядчикиПредписания, $comparison = null)
    {
        if ($�одрядчикиПредписания instanceof \ПодрядчикиПредписания) {
            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ПОДРЯДЧИК, $�одрядчикиПредписания->getId(), $comparison);
        } elseif ($�одрядчикиПредписания instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ПОДРЯДЧИК, $�одрядчикиПредписания->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByПодрядчикиПредписания() only accepts arguments of type \ПодрядчикиПредписания or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ПодрядчикиПредписания relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function joinПодрядчикиПредписания($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ПодрядчикиПредписания');

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
            $this->addJoinObject($join, 'ПодрядчикиПредписания');
        }

        return $this;
    }

    /**
     * Use the ПодрядчикиПредписания relation ПодрядчикиПредписания object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ПодрядчикиПредписанияQuery A secondary query class using the current class as primary query
     */
    public function useПодрядчикиПредписанияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinПодрядчикиПредписания($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ПодрядчикиПредписания', '\ПодрядчикиПредписанияQuery');
    }

    /**
     * Filter the query by a related \Проекты object
     *
     * @param \Проекты|ObjectCollection $�роекты The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByПроекты($�роекты, $comparison = null)
    {
        if ($�роекты instanceof \Проекты) {
            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ПРОЕКТ, $�роекты->getId(), $comparison);
        } elseif ($�роекты instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ПРОЕКТ, $�роекты->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
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
     * Filter the query by a related \СтатусыЗаявкиЗавершение object
     *
     * @param \СтатусыЗаявкиЗавершение|ObjectCollection $�татусыЗаявкиЗавершение The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByСтатусыЗаявкиЗавершение($�татусыЗаявкиЗавершение, $comparison = null)
    {
        if ($�татусыЗаявкиЗавершение instanceof \СтатусыЗаявкиЗавершение) {
            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ЗАВЕРШЕНИЕ, $�татусыЗаявкиЗавершение->getId(), $comparison);
        } elseif ($�татусыЗаявкиЗавершение instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ЗАВЕРШЕНИЕ, $�татусыЗаявкиЗавершение->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByСтатусыЗаявкиЗавершение() only accepts arguments of type \СтатусыЗаявкиЗавершение or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the СтатусыЗаявкиЗавершение relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function joinСтатусыЗаявкиЗавершение($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('СтатусыЗаявкиЗавершение');

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
            $this->addJoinObject($join, 'СтатусыЗаявкиЗавершение');
        }

        return $this;
    }

    /**
     * Use the СтатусыЗаявкиЗавершение relation СтатусыЗаявкиЗавершение object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \СтатусыЗаявкиЗавершениеQuery A secondary query class using the current class as primary query
     */
    public function useСтатусыЗаявкиЗавершениеQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinСтатусыЗаявкиЗавершение($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'СтатусыЗаявкиЗавершение', '\СтатусыЗаявкиЗавершениеQuery');
    }

    /**
     * Filter the query by a related \СтатусыЗаявкиПросрочка object
     *
     * @param \СтатусыЗаявкиПросрочка|ObjectCollection $�татусыЗаявкиПросрочка The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByСтатусыЗаявкиПросрочка($�татусыЗаявкиПросрочка, $comparison = null)
    {
        if ($�татусыЗаявкиПросрочка instanceof \СтатусыЗаявкиПросрочка) {
            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ПРОСРОЧКА, $�татусыЗаявкиПросрочка->getId(), $comparison);
        } elseif ($�татусыЗаявкиПросрочка instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_СТАТУС_ЗАЯВКИ_ПРОСРОЧКА, $�татусыЗаявкиПросрочка->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByСтатусыЗаявкиПросрочка() only accepts arguments of type \СтатусыЗаявкиПросрочка or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the СтатусыЗаявкиПросрочка relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function joinСтатусыЗаявкиПросрочка($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('СтатусыЗаявкиПросрочка');

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
            $this->addJoinObject($join, 'СтатусыЗаявкиПросрочка');
        }

        return $this;
    }

    /**
     * Use the СтатусыЗаявкиПросрочка relation СтатусыЗаявкиПросрочка object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \СтатусыЗаявкиПросрочкаQuery A secondary query class using the current class as primary query
     */
    public function useСтатусыЗаявкиПросрочкаQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinСтатусыЗаявкиПросрочка($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'СтатусыЗаявкиПросрочка', '\СтатусыЗаявкиПросрочкаQuery');
    }

    /**
     * Filter the query by a related \ТипыЗамечаний object
     *
     * @param \ТипыЗамечаний|ObjectCollection $�ипыЗамечаний The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByТипыЗамечаний($�ипыЗамечаний, $comparison = null)
    {
        if ($�ипыЗамечаний instanceof \ТипыЗамечаний) {
            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ТИП_ЗАМЕЧАНИЯ, $�ипыЗамечаний->getId(), $comparison);
        } elseif ($�ипыЗамечаний instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ТИП_ЗАМЕЧАНИЯ, $�ипыЗамечаний->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByТипыЗамечаний() only accepts arguments of type \ТипыЗамечаний or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ТипыЗамечаний relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function joinТипыЗамечаний($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ТипыЗамечаний');

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
            $this->addJoinObject($join, 'ТипыЗамечаний');
        }

        return $this;
    }

    /**
     * Use the ТипыЗамечаний relation ТипыЗамечаний object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ТипыЗамечанийQuery A secondary query class using the current class as primary query
     */
    public function useТипыЗамечанийQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinТипыЗамечаний($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ТипыЗамечаний', '\ТипыЗамечанийQuery');
    }

    /**
     * Filter the query by a related \Календарь object
     *
     * @param \Календарь|ObjectCollection $�алендарь The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByКалендарьRelatedByфактическаядатаустранения($�алендарь, $comparison = null)
    {
        if ($�алендарь instanceof \Календарь) {
            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯ_ДАТА_УСТРАНЕНИЯ, $�алендарь->getдата(), $comparison);
        } elseif ($�алендарь instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯ_ДАТА_УСТРАНЕНИЯ, $�алендарь->toKeyValue('PrimaryKey', 'дата'), $comparison);
        } else {
            throw new PropelException('filterByКалендарьRelatedByфактическаядатаустранения() only accepts arguments of type \Календарь or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the КалендарьRelatedByфактическаядатаустранения relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function joinКалендарьRelatedByфактическаядатаустранения($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('КалендарьRelatedByфактическаядатаустранения');

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
            $this->addJoinObject($join, 'КалендарьRelatedByфактическаядатаустранения');
        }

        return $this;
    }

    /**
     * Use the КалендарьRelatedByфактическаядатаустранения relation Календарь object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \КалендарьQuery A secondary query class using the current class as primary query
     */
    public function useКалендарьRelatedByфактическаядатаустраненияQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinКалендарьRelatedByфактическаядатаустранения($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'КалендарьRelatedByфактическаядатаустранения', '\КалендарьQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildПредписания $�редписания Object to remove from the list of results
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function prune($�редписания = null)
    {
        if ($�редписания) {
            $this->addUsingAlias(ПредписанияTableMap::COL_ID, $�редписания->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Предписания table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПредписанияTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ПредписанияTableMap::clearInstancePool();
            ПредписанияTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ПредписанияTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ПредписанияTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ПредписанияTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ПредписанияTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ПредписанияQuery
