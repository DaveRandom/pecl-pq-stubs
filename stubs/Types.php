<?php

namespace pq;

use pq\Exception\InvalidArgumentException;
use pq\Exception\BadMethodCallException;
use pq\Exception\RuntimeException;

/**
 * Class Types
 *
 * @package pq
 * @property-read Connection $connection The connection which was used to obtain type information
 */
class Types implements \ArrayAccess
{
    /**
     * OID of the bool type.
     */
    const BOOL = 16;

    /**
     * OID of the bytea type
     */
    const BYTEA = 17;

    /**
     * OID of the char type
     */
    const CHAR = 18;

    /**
     * OID of the name type
     */
    const NAME = 19;

    /**
     * OID of the int8 type
     */
    const INT8 = 20;

    /**
     * OID of the int2 type
     */
    const INT2 = 21;

    /**
     * OID of the int2vector type
     */
    const INT2VECTOR = 22;

    /**
     * OID of the int4 type
     */
    const INT4 = 23;

    /**
     * OID of the regproc type
     */
    const REGPROC = 24;

    /**
     * OID of the text type
     */
    const TEXT = 25;

    /**
     * OID of the oid type
     */
    const OID = 26;

    /**
     * OID of the tid type
     */
    const TID = 27;

    /**
     * OID of the xid type
     */
    const XID = 28;

    /**
     * OID of the cid type
     */
    const CID = 29;

    /**
     * OID of the oidvector type
     */
    const OIDVECTOR = 30;

    /**
     * OID of the pg_type type
     */
    const PG_TYPE = 71;

    /**
     * OID of the pg_attribute type
     */
    const PG_ATTRIBUTE = 75;

    /**
     * OID of the pg_proc type
     */
    const PG_PROC = 81;

    /**
     * OID of the pg_class type
     */
    const PG_CLASS = 83;

    /**
     * OID of the json type
     */
    const JSON = 114;

    /**
     * OID of the xml type
     */
    const XML = 142;

    /**
     * OID of the xmlarray type
     */
    const XMLARRAY = 143;

    /**
     * OID of the jsonarray type
     */
    const JSONARRAY = 199;

    /**
     * OID of the pg_node_tree type
     */
    const PG_NODE_TREE = 194;

    /**
     * OID of the smgr type
     */
    const SMGR = 210;

    /**
     * OID of the point type
     */
    const POINT = 600;

    /**
     * OID of the lseg type
     */
    const LSEG = 601;

    /**
     * OID of the path type
     */
    const PATH = 602;

    /**
     * OID of the box type
     */
    const BOX = 603;

    /**
     * OID of the polygon type
     */
    const POLYGON = 604;

    /**
     * OID of the line type
     */
    const LINE = 628;

    /**
     * OID of the linearray type
     */
    const LINEARRAY = 629;

    /**
     * OID of the float4 type
     */
    const FLOAT4 = 700;

    /**
     * OID of the float8 type
     */
    const FLOAT8 = 701;

    /**
     * OID of the abstime type
     */
    const ABSTIME = 702;

    /**
     * OID of the reltime type
     */
    const RELTIME = 703;

    /**
     * OID of the tinterval type
     */
    const TINTERVAL = 704;

    /**
     * OID of the unknown type
     */
    const UNKNOWN = 705;

    /**
     * OID of the circle type
     */
    const CIRCLE = 718;

    /**
     * OID of the circlearray type
     */
    const CIRCLEARRAY = 719;

    /**
     * OID of the money type
     */
    const MONEY = 790;

    /**
     * OID of the moneyarray type
     */
    const MONEYARRAY = 791;

    /**
     * OID of the macaddr type
     */
    const MACADDR = 829;

    /**
     * OID of the inet type
     */
    const INET = 869;

    /**
     * OID of the cidr type
     */
    const CIDR = 650;

    /**
     * OID of the boolarray type
     */
    const BOOLARRAY = 1000;

    /**
     * OID of the byteaarray type
     */
    const BYTEAARRAY = 1001;

    /**
     * OID of the chararray type
     */
    const CHARARRAY = 1002;

    /**
     * OID of the namearray type
     */
    const NAMEARRAY = 1003;

    /**
     * OID of the int2array type
     */
    const INT2ARRAY = 1005;

    /**
     * OID of the int2vectorarray type
     */
    const INT2VECTORARRAY = 1006;

    /**
     * OID of the int4array type
     */
    const INT4ARRAY = 1007;

    /**
     * OID of the regprocarray type
     */
    const REGPROCARRAY = 1008;

    /**
     * OID of the textarray type
     */
    const TEXTARRAY = 1009;

    /**
     * OID of the oidarray type
     */
    const OIDARRAY = 1028;

    /**
     * OID of the tidarray type
     */
    const TIDARRAY = 1010;

    /**
     * OID of the xidarray type
     */
    const XIDARRAY = 1011;

    /**
     * OID of the cidarray type
     */
    const CIDARRAY = 1012;

    /**
     * OID of the oidvectorarray type
     */
    const OIDVECTORARRAY = 1013;

    /**
     * OID of the bpchararray type
     */
    const BPCHARARRAY = 1014;

    /**
     * OID of the varchararray type
     */
    const VARCHARARRAY = 1015;

    /**
     * OID of the int8array type
     */
    const INT8ARRAY = 1016;

    /**
     * OID of the pointarray type
     */
    const POINTARRAY = 1017;

    /**
     * OID of the lsegarray type
     */
    const LSEGARRAY = 1018;

    /**
     * OID of the patharray type
     */
    const PATHARRAY = 1019;

    /**
     * OID of the boxarray type
     */
    const BOXARRAY = 1020;

    /**
     * OID of the float4array type
     */
    const FLOAT4ARRAY = 1021;

    /**
     * OID of the float8array type
     */
    const FLOAT8ARRAY = 1022;

    /**
     * OID of the abstimearray type
     */
    const ABSTIMEARRAY = 1023;

    /**
     * OID of the reltimearray type
     */
    const RELTIMEARRAY = 1024;

    /**
     * OID of the tintervalarray type
     */
    const TINTERVALARRAY = 1025;

    /**
     * OID of the polygonarray type
     */
    const POLYGONARRAY = 1027;

    /**
     * OID of the aclitem type
     */
    const ACLITEM = 1033;

    /**
     * OID of the aclitemarray type
     */
    const ACLITEMARRAY = 1034;

    /**
     * OID of the macaddrarray type
     */
    const MACADDRARRAY = 1040;

    /**
     * OID of the inetarray type
     */
    const INETARRAY = 1041;

    /**
     * OID of the cidrarray type
     */
    const CIDRARRAY = 651;

    /**
     * OID of the cstringarray type
     */
    const CSTRINGARRAY = 1263;

    /**
     * OID of the bpchar type
     */
    const BPCHAR = 1042;

    /**
     * OID of the varchar type
     */
    const VARCHAR = 1043;

    /**
     * OID of the date type
     */
    const DATE = 1082;

    /**
     * OID of the time type
     */
    const TIME = 1083;

    /**
     * OID of the timestamp type
     */
    const TIMESTAMP = 1114;

    /**
     * OID of the timestamparray type
     */
    const TIMESTAMPARRAY = 1115;

    /**
     * OID of the datearray type
     */
    const DATEARRAY = 1182;

    /**
     * OID of the timearray type
     */
    const TIMEARRAY = 1183;

    /**
     * OID of the timestamptz type
     */
    const TIMESTAMPTZ = 1184;

    /**
     * OID of the timestamptzarray type
     */
    const TIMESTAMPTZARRAY = 1185;

    /**
     * OID of the interval type
     */
    const INTERVAL = 1186;

    /**
     * OID of the intervalarray type
     */
    const INTERVALARRAY = 1187;

    /**
     * OID of the numericarray type
     */
    const NUMERICARRAY = 1231;

    /**
     * OID of the timetz type
     */
    const TIMETZ = 1266;

    /**
     * OID of the timetzarray type
     */
    const TIMETZARRAY = 1270;

    /**
     * OID of the bit type
     */
    const BIT = 1560;

    /**
     * OID of the bitarray type
     */
    const BITARRAY = 1561;

    /**
     * OID of the varbit type
     */
    const VARBIT = 1562;

    /**
     * OID of the varbitarray type
     */
    const VARBITARRAY = 1563;

    /**
     * OID of the numeric type
     */
    const NUMERIC = 1700;

    /**
     * OID of the refcursor type
     */
    const REFCURSOR = 1790;

    /**
     * OID of the refcursorarray type
     */
    const REFCURSORARRAY = 2201;

    /**
     * OID of the regprocedure type
     */
    const REGPROCEDURE = 2202;

    /**
     * OID of the regoper type
     */
    const REGOPER = 2203;

    /**
     * OID of the regoperator type
     */
    const REGOPERATOR = 2204;

    /**
     * OID of the regclass type
     */
    const REGCLASS = 2205;

    /**
     * OID of the regtype type
     */
    const REGTYPE = 2206;

    /**
     * OID of the regprocedurearray type
     */
    const REGPROCEDUREARRAY = 2207;

    /**
     * OID of the regoperarray type
     */
    const REGOPERARRAY = 2208;

    /**
     * OID of the regoperatorarray type
     */
    const REGOPERATORARRAY = 2209;

    /**
     * OID of the regclassarray type
     */
    const REGCLASSARRAY = 2210;

    /**
     * OID of the regtypearray type
     */
    const REGTYPEARRAY = 2211;

    /**
     * OID of the uuid type
     */
    const UUID = 2950;

    /**
     * OID of the uuidarray type
     */
    const UUIDARRAY = 2951;

    /**
     * OID of the tsvector type
     */
    const TSVECTOR = 3614;

    /**
     * OID of the gtsvector type
     */
    const GTSVECTOR = 3642;

    /**
     * OID of the tsquery type
     */
    const TSQUERY = 3615;

    /**
     * OID of the regconfig type
     */
    const REGCONFIG = 3734;

    /**
     * OID of the regdictionary type
     */
    const REGDICTIONARY = 3769;

    /**
     * OID of the tsvectorarray type
     */
    const TSVECTORARRAY = 3643;

    /**
     * OID of the gtsvectorarray type
     */
    const GTSVECTORARRAY = 3644;

    /**
     * OID of the tsqueryarray type
     */
    const TSQUERYARRAY = 3645;

    /**
     * OID of the regconfigarray type
     */
    const REGCONFIGARRAY = 3735;

    /**
     * OID of the regdictionaryarray type
     */
    const REGDICTIONARYARRAY = 3770;

    /**
     * OID of the txid_snapshot type
     */
    const TXID_SNAPSHOT = 2970;

    /**
     * OID of the txid_snapshotarray type
     */
    const TXID_SNAPSHOTARRAY = 2949;

    /**
     * OID of the int4range type
     */
    const INT4RANGE = 3904;

    /**
     * OID of the int4rangearray type
     */
    const INT4RANGEARRAY = 3905;

    /**
     * OID of the numrange type
     */
    const NUMRANGE = 3906;

    /**
     * OID of the numrangearray type
     */
    const NUMRANGEARRAY = 3907;

    /**
     * OID of the tsrange type
     */
    const TSRANGE = 3908;

    /**
     * OID of the tsrangearray type
     */
    const TSRANGEARRAY = 3909;

    /**
     * OID of the tstzrange type
     */
    const TSTZRANGE = 3910;

    /**
     * OID of the tstzrangearray type
     */
    const TSTZRANGEARRAY = 3911;

    /**
     * OID of the daterange type
     */
    const DATERANGE = 3912;

    /**
     * OID of the daterangearray type
     */
    const DATERANGEARRAY = 3913;

    /**
     * OID of the int8range type
     */
    const INT8RANGE = 3926;

    /**
     * OID of the int8rangearray type
     */
    const INT8RANGEARRAY = 3927;

    /**
     * OID of the record type
     */
    const RECORD = 2249;

    /**
     * OID of the recordarray type
     */
    const RECORDARRAY = 2287;

    /**
     * OID of the cstring type
     */
    const CSTRING = 2275;

    /**
     * OID of the any type
     */
    const ANY = 2276;

    /**
     * OID of the anyarray type
     */
    const ANYARRAY = 2277;

    /**
     * OID of the void type
     */
    const VOID = 2278;

    /**
     * OID of the trigger type
     */
    const TRIGGER = 2279;

    /**
     * OID of the event_trigger type
     */
    const EVENT_TRIGGER = 3838;

    /**
     * OID of the language_handler type
     */
    const LANGUAGE_HANDLER = 2280;

    /**
     * OID of the internal type
     */
    const INTERNAL = 2281;

    /**
     * OID of the opaque type
     */
    const OPAQUE = 2282;

    /**
     * OID of the anyelement type
     */
    const ANYELEMENT = 2283;

    /**
     * OID of the anynonarray type
     */
    const ANYNONARRAY = 2776;

    /**
     * OID of the anyenum type
     */
    const ANYENUM = 3500;

    /**
     * OID of the fdw_handler type
     */
    const FDW_HANDLER = 3115;

    /**
     * OID of the anyrange type
     */
    const ANYRANGE = 3831;

    /**
     * Create a new instance populated with information obtained from the pg_type relation
     *
     * @param Connection $conn The connection to use
     * @param string[] $namespaces Which namespaces to query (defaults to public and pg_catalog)
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function __construct(Connection $conn, array $namespaces = null) {}

    /**
     * Refresh type information from pg_type
     *
     * @param string[] $namespaces Which namespaces to query (defaults to public and pg_catalog)
     * @throws InvalidArgumentException
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function refresh(array $namespaces = null) {}

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {}

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset) {}

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) {}

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset) {}
}
