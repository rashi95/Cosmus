# given a positive number to check whether it is a palindrome or not 
def Palindrome_Number():
    n = raw_input()
    m = n
    a = 0
    while m != 0:
        a = m % 10 + a * 10
        m = m * 10
    if n == a:
        print "is a palindrome number"
    else:
        print "is not a palindrome number"

Palindrome_Number()


