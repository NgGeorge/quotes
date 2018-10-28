.mode csv
drop table if exists quotes;
.import temp.csv quotes
