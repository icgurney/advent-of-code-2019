<?php

<?php

$inputArray = [
    147129,
128896,
86366,
121702,
106854,
107418,
96021,
116460,
100395,
149526,
146314,
56215,
59911,
96016,
86483,
115837,
84522,
137658,
105769,
149691,
127499,
95302,
53109,
101940,
106343,
140421,
88790,
105898,
68085,
85027,
99405,
116253,
55338,
50009,
58244,
145865,
145270,
148777,
139954,
147397,
128691,
63082,
144279,
76143,
73006,
105508,
62796,
144807,
66587,
50828,
143778,
73793,
76852,
119991,
103181,
105618,
106320,
136345,
68771,
82534,
94528,
65802,
74863,
139414,
65854,
149543,
87063,
85691,
148931,
139653,
90728,
100710,
110159,
131407,
129323,
145874,
127227,
129006,
105828,
67468,
136905,
89273,
133439,
78783,
90794,
116324,
132792,
135413,
142086,
62659,
59178,
59080,
122465,
62753,
112104,
92551,
90638,
145232,
133984,
139994];

$sum = 0;

foreach($inputArray as $value){
    $sum += floor($value / 3) - 2;
}

echo $sum;
