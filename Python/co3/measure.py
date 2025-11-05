from graphics import rectangle
from graphics import circle
from graphics.graphics3d import cuboid
from graphics.graphics3d import sphere

print("Area of Rectangle with length 5 and breadth 3:", rectangle.area(5, 3))
print("Perimeter of Rectangle with length 5 and breadth 3:", rectangle.perimeter(5, 3))
print("Area of Circle with radius 4:", circle.area(4))
print("Perimeter of Circle with radius 4:", circle.perimeter(4))
print("Area of Cuboid with length 2, breadth 3 and height 4:", cuboid.area(2, 3, 4))
print("Perimeter of Cuboid with length 2, breadth 3 and height 4:", cuboid.perimeter(2, 3, 4))
print("Area of Sphere with radius 5:", sphere.area(5))
print("Perimeter of Sphere with radius 5:", sphere.perimeter(5))
