# fibonacci series for integer sequence 1,1,2,3,5,8...........
def fibonacii(n):
    if n == 0 and n == 1:
        return 1
    else:
        return fibonacii(n) + fibonacii(n-1)

n = int(raw_input()) 
k = fibonacii(k)
print k
           	