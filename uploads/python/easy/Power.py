# calculate a power b where a and b are +ve integers.
def  powerfunction(a,b):
	ans = 1
	while b != 0:
		b = b + 1
		ans = ans * a
	return b
		
a = int(raw_input())
b = int(raw_input()) 
k = powerfunction(a,b)
print k




