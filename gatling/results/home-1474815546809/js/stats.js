var stats = {
    type: "GROUP",
name: "Global Information",
path: "",
pathFormatted: "group_missing-name-b06d1",
stats: {
    "name": "Global Information",
    "numberOfRequests": {
        "total": "20",
        "ok": "20",
        "ko": "0"
    },
    "minResponseTime": {
        "total": "1165",
        "ok": "1165",
        "ko": "-"
    },
    "maxResponseTime": {
        "total": "9311",
        "ok": "9311",
        "ko": "-"
    },
    "meanResponseTime": {
        "total": "6230",
        "ok": "6230",
        "ko": "-"
    },
    "standardDeviation": {
        "total": "2508",
        "ok": "2508",
        "ko": "-"
    },
    "percentiles1": {
        "total": "6925",
        "ok": "6925",
        "ko": "-"
    },
    "percentiles2": {
        "total": "8294",
        "ok": "8294",
        "ko": "-"
    },
    "percentiles3": {
        "total": "9123",
        "ok": "9123",
        "ko": "-"
    },
    "percentiles4": {
        "total": "9273",
        "ok": "9273",
        "ko": "-"
    },
    "group1": {
        "name": "t < 800 ms",
        "count": 0,
        "percentage": 0
    },
    "group2": {
        "name": "800 ms < t < 1200 ms",
        "count": 1,
        "percentage": 5
    },
    "group3": {
        "name": "t > 1200 ms",
        "count": 19,
        "percentage": 95
    },
    "group4": {
        "name": "failed",
        "count": 0,
        "percentage": 0
    },
    "meanNumberOfRequestsPerSecond": {
        "total": "0.769",
        "ok": "0.769",
        "ko": "-"
    }
},
contents: {
"req_arrive-e-sur-le-1f5d0": {
        type: "REQUEST",
        name: "arrivée sur le site",
path: "arrivée sur le site",
pathFormatted: "req_arrive-e-sur-le-1f5d0",
stats: {
    "name": "arrivée sur le site",
    "numberOfRequests": {
        "total": "10",
        "ok": "10",
        "ko": "0"
    },
    "minResponseTime": {
        "total": "1165",
        "ok": "1165",
        "ko": "-"
    },
    "maxResponseTime": {
        "total": "9114",
        "ok": "9114",
        "ko": "-"
    },
    "meanResponseTime": {
        "total": "5256",
        "ok": "5256",
        "ko": "-"
    },
    "standardDeviation": {
        "total": "2549",
        "ok": "2549",
        "ko": "-"
    },
    "percentiles1": {
        "total": "5378",
        "ok": "5378",
        "ko": "-"
    },
    "percentiles2": {
        "total": "7472",
        "ok": "7472",
        "ko": "-"
    },
    "percentiles3": {
        "total": "8684",
        "ok": "8684",
        "ko": "-"
    },
    "percentiles4": {
        "total": "9028",
        "ok": "9028",
        "ko": "-"
    },
    "group1": {
        "name": "t < 800 ms",
        "count": 0,
        "percentage": 0
    },
    "group2": {
        "name": "800 ms < t < 1200 ms",
        "count": 1,
        "percentage": 10
    },
    "group3": {
        "name": "t > 1200 ms",
        "count": 9,
        "percentage": 90
    },
    "group4": {
        "name": "failed",
        "count": 0,
        "percentage": 0
    },
    "meanNumberOfRequestsPerSecond": {
        "total": "0.385",
        "ok": "0.385",
        "ko": "-"
    }
}
    },"req_arrive-e-sur-le-cc555": {
        type: "REQUEST",
        name: "arrivée sur le site Redirect 1",
path: "arrivée sur le site Redirect 1",
pathFormatted: "req_arrive-e-sur-le-cc555",
stats: {
    "name": "arrivée sur le site Redirect 1",
    "numberOfRequests": {
        "total": "10",
        "ok": "10",
        "ko": "0"
    },
    "minResponseTime": {
        "total": "3158",
        "ok": "3158",
        "ko": "-"
    },
    "maxResponseTime": {
        "total": "9311",
        "ok": "9311",
        "ko": "-"
    },
    "meanResponseTime": {
        "total": "7203",
        "ok": "7203",
        "ko": "-"
    },
    "standardDeviation": {
        "total": "2046",
        "ok": "2046",
        "ko": "-"
    },
    "percentiles1": {
        "total": "7950",
        "ok": "7950",
        "ko": "-"
    },
    "percentiles2": {
        "total": "8841",
        "ok": "8841",
        "ko": "-"
    },
    "percentiles3": {
        "total": "9221",
        "ok": "9221",
        "ko": "-"
    },
    "percentiles4": {
        "total": "9293",
        "ok": "9293",
        "ko": "-"
    },
    "group1": {
        "name": "t < 800 ms",
        "count": 0,
        "percentage": 0
    },
    "group2": {
        "name": "800 ms < t < 1200 ms",
        "count": 0,
        "percentage": 0
    },
    "group3": {
        "name": "t > 1200 ms",
        "count": 10,
        "percentage": 100
    },
    "group4": {
        "name": "failed",
        "count": 0,
        "percentage": 0
    },
    "meanNumberOfRequestsPerSecond": {
        "total": "0.385",
        "ok": "0.385",
        "ko": "-"
    }
}
    }
}

}

function fillStats(stat){
    $("#numberOfRequests").append(stat.numberOfRequests.total);
    $("#numberOfRequestsOK").append(stat.numberOfRequests.ok);
    $("#numberOfRequestsKO").append(stat.numberOfRequests.ko);

    $("#minResponseTime").append(stat.minResponseTime.total);
    $("#minResponseTimeOK").append(stat.minResponseTime.ok);
    $("#minResponseTimeKO").append(stat.minResponseTime.ko);

    $("#maxResponseTime").append(stat.maxResponseTime.total);
    $("#maxResponseTimeOK").append(stat.maxResponseTime.ok);
    $("#maxResponseTimeKO").append(stat.maxResponseTime.ko);

    $("#meanResponseTime").append(stat.meanResponseTime.total);
    $("#meanResponseTimeOK").append(stat.meanResponseTime.ok);
    $("#meanResponseTimeKO").append(stat.meanResponseTime.ko);

    $("#standardDeviation").append(stat.standardDeviation.total);
    $("#standardDeviationOK").append(stat.standardDeviation.ok);
    $("#standardDeviationKO").append(stat.standardDeviation.ko);

    $("#percentiles1").append(stat.percentiles1.total);
    $("#percentiles1OK").append(stat.percentiles1.ok);
    $("#percentiles1KO").append(stat.percentiles1.ko);

    $("#percentiles2").append(stat.percentiles2.total);
    $("#percentiles2OK").append(stat.percentiles2.ok);
    $("#percentiles2KO").append(stat.percentiles2.ko);

    $("#percentiles3").append(stat.percentiles3.total);
    $("#percentiles3OK").append(stat.percentiles3.ok);
    $("#percentiles3KO").append(stat.percentiles3.ko);

    $("#percentiles4").append(stat.percentiles4.total);
    $("#percentiles4OK").append(stat.percentiles4.ok);
    $("#percentiles4KO").append(stat.percentiles4.ko);

    $("#meanNumberOfRequestsPerSecond").append(stat.meanNumberOfRequestsPerSecond.total);
    $("#meanNumberOfRequestsPerSecondOK").append(stat.meanNumberOfRequestsPerSecond.ok);
    $("#meanNumberOfRequestsPerSecondKO").append(stat.meanNumberOfRequestsPerSecond.ko);
}
