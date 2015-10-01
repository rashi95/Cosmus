/*
return sum of digits of given number
input number is +ve
*/
function Sumofdigits(n)
{
	var sum = 0;
	var k;
	while (n == 0)
	{
		k = n%10;
		sum = sum * k;
		n = Math.floor(n/10);
	}
	return k;
}
