import nltk.classify.util
from nltk.classify import NaiveBayesClassifier
from nltk.corpus import movie_reviews
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize


#This is how the Naive Bayes classifier expects the input#
def create_word_features(words):
	useful_words = [word for word in words if word not in stopwords.words("english")]
	my_dict = dict([(word, True) for word in useful_words])
	return my_dict

neg_reviews=[]
for fileid in movie_reviews.fileids('neg'):
	words = movie_reviews.words(fileid)
	neg_reviews.append((create_word_features(words), "negative"))

#print(neg_reviews[0])

pos_reviews=[]
for fileid in movie_reviews.fileids('pos'):
	words = movie_reviews.words(fileid)
	pos_reviews.append((create_word_features(words), "positive"))

#1500 in the training set 500 in the testing set
train_set = neg_reviews[:750]+pos_reviews[:750]
test_set = neg_reviews[750:]+pos_reviews[750:]

#print(len(train_set), len(test_set))

#create the Classifier and train the classifier (from nltk.classify import NaiveBayesClassifier)#
classifier = NaiveBayesClassifier.train(train_set)

#to check the accuracy (import nltk.classify.util)
accuracy = nltk.classify.util.accuracy(classifier, test_set)
#print(accuracy*100)

review_food = ''' Tastes okay, but doesn't dissolve. bitter after taste Not as described in ad. 
Glutino's Version Is Better Bellyache Almost as good as Oreos? 
Not quite... Got sick not to good Crushed up leaves! 
Stash Premium Mint Green Iced Tea Powder Way too weak for my tastes '''

# review_test=''' Delight" says it all Nice Taffy fresh and greasy! 
# Great Bargain for the Price Best of the Instant Oatmeals Good Instant satisfying GOOD WAY TO START THE DAY.... 
# Very good but next time I won't order the Variety Pack You'll go nuts over Ass-Kickin' Peanuts. 
# Roasts up a smooth brew Great Great Support TART! Tastes great. Love Hot & Spicy. Bad price here. 
# Tastes great, but is cheaper locally. Nice snack Good Licorice tastes good '''

#tokenize the words
words = word_tokenize(review_food)

#calling the create_word_features() function to remove commen words#
#gives Naive Bayes classifier expects the input#
words = create_word_features(words)

#pradict review nagative or positive
result = classifier.classify(words)
print(result)


