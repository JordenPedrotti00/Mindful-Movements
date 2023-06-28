# Mindful Movements Program

# This program will help people develop healthy and mindful movement habits

# imports
import time
import random

# variables
movements = ["jumping jacks", "squats", "shoulder presses", 
             "burpees", "mountain climbers", "lunges", 
             "push-ups", "tricep dips", "side lunges", 
             "plank"]

# functions
def select_movement():
    """This function randomly selects a movement"""
    return random.choice(movements)

def display_movement(movement):
    """This function displays the selected movement"""
    print("\nThe movement for today is: " + movement + "\n")

def start_timer():
    """This function starts a 10 second timer"""
    print("Starting timer...")
    time.sleep(10)
    print("Timer finished!\n")

def complete_movement():
    """This function runs the complete program"""
    movement = select_movement()
    display_movement(movement)
    start_timer()

# main function
def main():
    """This function runs the program"""
    while True:
        answer = input("Would you like to complete a movement? (y/n): ").lower()
        if answer == "y":
            complete_movement()
        else:
            print("Goodbye!")
            break

# start program
if __name__ == "__main__":
    main()