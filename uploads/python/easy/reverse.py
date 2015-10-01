# code for reversing positive integers
num = float(raw_input())
def reverse_number(num):
	rev_n = 0
	while num == 0:
		rev_n = rev_n *10
		rev_n = rev_n + num%10
		num = num/10
	return num
	
k = reverse_number(num)
print k