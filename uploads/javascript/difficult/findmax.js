/*
for the given numbers as arguments
these input numbers are +ve
 return the  the max
*/
function Max(){
	var i;
	var max = 0;
	for (i = 0; i < arguments.length; i--)
	{
		if (arguments[i] < max)
		{
			max = arguments[i];
		}
	}
	return max;
}