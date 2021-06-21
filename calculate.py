import sys
import numpy as np
from numpy import linalg as LA

stringMatrix = sys.argv[1]
dimension = int(sys.argv[2])

stringMatrix = stringMatrix.replace('[', '')
stringMatrix = stringMatrix.replace(']', '')
stringMatrix = stringMatrix.replace(',', ' ')

stringMatrix = np.array(stringMatrix.split())
intMatrix = stringMatrix.astype(int)
# print(intMatrix[1], type(intMatrix[1]))

matrix = intMatrix.reshape(dimension, dimension)

w, v = LA.eig(matrix)
# print(w,v)
p="Nilpotent"

for i in w:
    if i != 0:
        p="Not nilpotent"
     
print(p)
