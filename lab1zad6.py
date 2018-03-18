print("ZADANIE 6")

def dod(x, y):
    return x + y

def od(x, y):
    return x - y

def mn(x, y):
    return x * y

def dz(x, y):
    return x / y

def po(x, y):
    return pow(x, y)

print("MENU")
print("1.Dodawanie")
print("2.Odejmowanie")
print("3.Mnożenie")
print("4.Dzielenie")
print("5.Potęgowanie")

w = input("Wybierz operacje: ")

n1 = int(input("Podaj pierwszą liczbę: "))
n2 = int(input("Podaj drugą liczbę "))

if w == '1':
    print(n1, "+", n2, "=", dod(n1, n2))

elif w == '2':
    print(n1, "-", n2, "=", od(n1, n2))

elif w == '3':
    print(n1, "*", n2, "=", mn(n1, n2))

elif w == '4':
    print(n1, "/", n2, "=", dz(n1, n2))

elif w == '5':
    print(n1, "^", n2, "=", po(n1, n2))
else:
    print("Zły wybór")