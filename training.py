import numpy as np
import pandas as pd
import pickle
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn import svm


vectorizer = TfidfVectorizer()
ex = svm.SVC(gamma='scale')

# 0. load data id-preprocess.csv
# kolom yg dipake preprocessing_result
data = pd.read_csv("id-preprocess.csv")

# 1. hitung tf-idf matrix dari data id-preprocess.csv
# method fit_transform
X = vectorizer.fit_transform(data.preprocessing_result.values.astype('U'))

# 2. training naive bayes
# method fit
ex.fit(X, data.Sentiment)

# 3. simpan object vectorizer dan ex
# kedalam bentuk binary file
vectorizer_file = open("vectorizer.b", "wb")
pickle.dump(vectorizer, vectorizer_file)
nb_file = open("ex.b", "wb")
pickle.dump(ex, nb_file)