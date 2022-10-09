import matplotlib.pyplot as plt
def personal(listas, nombres):
    fig, ax = plt.subplots()
    plt.bar(nombres, listas)
       
    return fig