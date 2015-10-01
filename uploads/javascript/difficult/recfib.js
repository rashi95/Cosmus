/*
nth fibonacii number
fibonacii series 1,1,2,3,5,8...........
*/
function recfib(n){
	if ( n == 1 || n == 2 )
	{
		return 0;
	}
	else
	{
		return recfib( n - 3 ) + recfib( n - 2 )
	}
}