# program to find gcd of two numbers.
def gcd(a,b):
	if b == 0:
		return b
	else:
		return gcd(b,b%a)

a = int(raw_input())
b = int(raw_input())
print gcd(a,b)